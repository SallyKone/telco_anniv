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
    
    //LES FONCTIONS GET
    public function profil()
    {
    	if (session()->has("idcandidat")) {
            $idcandidat =  (int)session()->get("idcandidat");
            $candidat = Candidats::findorfail($idcandidat);
            return view('profil')->with(['candidat'=>$candidat,'statut'=>true,'message'=>"Recuperer avec succès!!"]);
        }
        else
        {
            return view('connexion');
        }
    }

    public function showModifProfil(Request $requete)
    {
        if (session()->has("idcandidat")) {
            $idcandidat =  (int)session()->get("idcandidat");
            $candidat = Candidats::findorfail($idcandidat);
            return view('modifeprofile')->with(['candidat'=>$candidat,'statut'=>true,'message'=>"Recuperer avec succès!!"]);
        }
        else
        {
            return view('connexion');
        }
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
        $candidat->photo = "images/img/avatar/defaut.jpg";
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
    public function modifProfil(Request $request)
    {
        $messg="";$avatar="";
        if (session()->has("idcandidat")) {
            $idcandidat =  (int)session()->get("idcandidat");
            $candidats = Candidats::find($idcandidat); 
            $candidats->nom = $request->nom; 
            $candidats->prenom = $request->prenom; 
            $candidats->jour_naiss = $request->jour; 
            $candidats->mois_naiss = $request->mois; 
            $candidats->annee_naiss = $request->annee;                
            $candidats->telephone = $request->telephone;
            
            //Enregistrement d'images autiorisées
            $typepermis = ['jpg','png','jpeg'];
            $cheminacces ="images/img/avatar/";

            if($_FILES["photo"]["error"] == 0 && isset($_FILES["photo"]))
            {
                $nimg = $_FILES["photo"]["name"];
                $tabextens = pathinfo($nimg);
                $extens = $tabextens['extension'];
                $tmpimg = $_FILES["photo"]["tmp_name"];
                $typimg = $_FILES["photo"]["type"];
                $avatar = session()->get("idcandidat").session()->get("nom").".".$extens;
                $cheminacces = $cheminacces.$avatar;
                $candidats->photo = $cheminacces;

                if(1048600 > $_FILES["photo"]["size"])
                {
                    if(in_array($extens, $typepermis))
                    {
                        if(move_uploaded_file($tmpimg, $cheminacces))
                        {
                            if($candidats->save())
                            {
                                return view('modifeprofile')->with(['candidat'=>$candidats,'statut'=>true,'message'=>"Modifié avec succès !!"]);
                            }else
                            {
                                return view('modifeprofile')->with(['candidat'=>$candidats,'statut'=>false,'message'=>"Impossible de modifier !!"]);
                            }
                        }
                    }
                    else
                    {
                        $messg="Choississez uniquement une image jpeg ou png";
                    }
                }
                else
                {
                    $messg="La taille de l'image doit être inferieure à 1 Mo";
                }
                return view('modifeprofile')->with(['candidat'=>$candidats,'message'=>$messg,'statut'=>false]);
            }
            else 
            {
                if($candidats->save())
                {
                    return view('modifeprofile')->with(['candidat'=>$candidats,'statut'=>true,'message'=>"Modifié avec succès !!"]);
                }else
                {
                    return view('modifeprofile')->with(['candidat'=>$candidats,'statut'=>false,'message'=>"Impossible de modifier !!"]);
                }
            }
        }
        else
        {
            return view('connexion');
        }
    }
}
