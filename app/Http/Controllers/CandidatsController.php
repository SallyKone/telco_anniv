<?php

namespace App\Http\Controllers;
 
use App\Candidats;
use App\Anniversaires;
use App\Votes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CandidatsController extends Controller
{
    //Fonctions Utilitaires
    function enregistreImage(Request $requet,$image){
        //Types d'images autiorisés
        $typepermis["jpg","png","jpeg"];
        $limage = $requet->file($image);
        $extension = $limage->extension();
        if($requet->hasFile($image))
        {
            if (in_array($extension, $typepermis))
            {
                if ($limage->isValid()) {
                    # code...
                }
            }
        }
        else 
        {
            # code...
        }

    }
    //LES FONCTIONS GET
    public function profil()
    {
    	return view('profil');
    }
    public function showModifProfil($idcandidat)
    {
        $candidat = Candidats::findorfail($idcandidat);

        return view('modifProfilCandidat',compact($candidat);
    }
    //AJOUTER UN CANDIDAT
    public function ajouterCandidat($login,$mdpass,$codecandidat,$nom,$prenom,$numero,$journaiss,$moisnaiss)
    {
        $candidat = new Candidats;
        $candidat->login = $login;
        $candidat->motpass = encrypt($mdpass);
        $candidat->codecandidat = $codecandidat;
        $candidat->nom = $nom;
        $candidat->prenom = $prenom;
        $candidat->nom_inscription = $nom.' '.$prenom;
        $candidat->numero = $numero;
        $candidat->jour_naiss = $journaiss;
        $candidat->mois_naiss = $moisnaiss;
        try
        {
            return $candidat->save();
        }
        catch(Exception $e)
        {
            #Log::error($e);
            return $e->getMessage();
        }
    }
    //MODIFIER CANDIDATS
    public function modifProfilCandidat(Request $requete)
    {
        $id_ = $requete->idcandidat;
        $nom = $requete->nom;
        $prenom = $requete->prenom;
        $numero = $requete->numero;
        $telephone = $requete->telephone;
        $photo = $requete->photo;
        $jour_naiss = $requete->journaiss;
        $mois_naiss = $requete->moisnaiss;
        $annee_naiss = $requete->moisnaiss;
        try
        {
            DB::table('candidats')->where('id', $id_)->update(['nom' => $nom,'prenom' => $prenom,'numero' => $numero,'telephone' => $telephone,'numero' => $numero,'jour_naiss' => $jour_naiss,'mois_naiss' => $mois_naiss,'annee_naiss' => $annee_naiss,'photo' => $photo]);
        }
        catch(Exception $e)
        {
            #Log::error($e);
            return $e->getMessage();
        }
    }
    //Liste de tous les candidats
    public function getAllCandidats()
    {
    	return DB::table('candidats')->get();
    }
    //LES FONCTIONS POST
    
    //Liste des 10er candidats d'une date d'anniversai
    public function getTop10Candidats($ladate)
    {
    	$requet = DB::table('anniversaires')->join('votes', 'anniversaires.id', '=', 'votes.id_anniversaire')->join('candidats', 'candidats.id', '=', 'votes.id_candidat')
            ->selectRaw('candidats.*, anniversaires.date_anniv, COUNT(votes.id) as voix')->where([['anniversaires.date_anniv','=',$ladate],['anniversaires.anniv_cloture','=',0]])->groupBy('votes.id_candidat')->orderBy('voix','desc')->limit(10)->get();
        $requete= $requet->toSql();
        return DB::select(DB::raw($requete));
    }
}
