<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Providers\Utilitaires;
use App\Utilisateurs;
use App\Candidats;

class AdminsController extends Controller
{
    //
	public function __construct(Utilitaires $util)
    {

    }
    public function dashbord(Utilitaires $util)
    {
    	return view('admins/index');
    }
    public function showLogin(Utilitaires $util)
    {
    	return view('admins/login');
    }
    //Connexion
    public function connexion(Request $requete){
        session()->start();
        
        $login = $requete->input('login');
        $motpass = $requete->input('mdpasse');
        
        if (DB::table('utilisateurs')->where('login','=',$login)->exists())
        {
            $utilisateur = DB::table('utilisateurs')->where('login','=',$login)->first();
            if ($motpass == $utilisateur->motpass) {
                session()->put('utlisteur',$utilisateur->id);
                session()->put('nom',$utilisateur->nom);
                session()->put('prenom',$utilisateur->prenom);
                session()->put('telephone',$utilisateur->telephone);
                session()->put('photo',$utilisateur->photo);
                //session()->save();

                return view('admins/index');
            }else{
                return view('admins/login')->with(['statut'=>false, 'message'=>'Mot de passe erroné ! ']);
            }
        }else{
            return view('admins/login')->with(['statut'=>false, 'message'=>'Utilisateur inconnu ! ']);
        }
    }
    //CANDIDATS
    public function showCandidat(Request $request)
    {
        $idcandidat = $request->id;
        
        $nbrami = DB::table('candidats')->leftjoin('amis','candidats.id','=','amis.id_candidat')->groupBy('candidats.id')->select(DB::raw('COUNT(amis.id_candidat) as nbramis'))->where('candidats.id',$idcandidat)->get();

        $candidat = Candidats::findOrfail($idcandidat);
        return view('admins/candidat')->with(['candidat'=>$candidat,'nbrami'=>$nbrami[0]->nbramis]);
    }
    //Liste de tous les candidats
    public function getAllCandidats()
    {
        $nomtable = 'candidat';
        $titreliste = 'Liste de tous les candidats';
        $lists = DB::table('candidats')->leftjoin('amis','candidats.id','=','amis.id_candidat')->groupBy('candidats.id')->select(DB::raw('COUNT(amis.id_candidat) as nbramis'),'candidats.id', 'candidats.login' , 'candidats.codecandidat', 'candidats.nom', 'candidats.prenom', 'candidats.numero', 'candidats.photo', 'candidats.jour_naiss', 'candidats.mois_naiss', 'annee_naiss', 'candidats.genre', 'candidats.profil_complet')->get();
        $colonnes = ['Nom & Prenom', 'Login', 'Code', 'Jour', 'Mois', 'Année', 'Genre', 'Numéro', 'Ami(s)', 'Profil'];

        return view('admins/liste')->with(['nomtable'=>$nomtable,'titreliste'=>$titreliste,'lists'=>$lists,'colonnes'=>$colonnes]);
    }
    public function modifierCandidat(Request $request)
    {
        $messg="";$avatar="";
         
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
            $candidats->photo = $avatar;
            $candidats->updated_at = now();

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
}