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
        return view('modifProfilCandidat',compact($candidat));
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

    //MODIFIER CANDIDATS
    public function modifProfil(Request $requete)

        $candidats = Candidats::find(1); 
        $candidats->nom = $request->nom; 
        $candidats->prenom = $request->prenom; 
        $candidats->jour_naiss = $request->jour; 
        $candidats->mois_naiss = $request->mois; 
        $candidats->annee_naiss = $request->annee;
        $candidats->photo = $request->photo;                
        $candidats->telephone = $request->telephone; 

         $candidats->save();

        if($candidats->save()){
            return redirect()->back()->withSuccess("Votre ami(e) a été ajouté avec succès!!!");
        }else{
            return redirect()->back()->withError("Une erreur est parvenue, veuillez recommencer");
        }


    }
}
