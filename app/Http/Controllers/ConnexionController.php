<?php

namespace App\Http\Controllers;
 
use App\Candidats;
use App\Http\Controllers\Controllers;
use App\Http\Controllers\CandidatsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class ConnexionController extends Controller
{
    
	//LES FONCTIONS GET
    public function showConnexion()
    {
    	return view('connexion');
    }
    
    //LES FONCTIONS POST
    //Fonction de connexion des candidats
    public function connecter(Request $requete){
        //Démarrer la session
    	session()->start();
        
    	$login = $requete->input('login');
    	$motpass = $requete->input('password');
        
    	if (DB::table('candidats')->where('login','=',$login)->exists())
        {
            $candidat = DB::table('candidats')->where('login','=',$login)->first();
            if($candidat->motpass = encrypt($motpass))
            {
                Session::put('idcandidat',$candidat->id);
                Session::put('nom',$candidat->nom);
                Session::put('prenom',$candidat->prenom);
                Session::put('ip',$requete-ip());
                Session::save();
                return view('profil')->with(['candidat'=> $candidat,'statut'=> true,'message'=>'Bienvenue ']);
            }
            else
            {
                return view('connexion')->with(['statut'=> false,'message'=>'Mot de passe incorrect !']);
            }
    	}

    	return view('connexion')->with(['statut'=> false,'message'=>'Mot de passe incorrect !']);
    }
    public function deconnecter(Request $requete){
        //Démarrer la session
        if($request->session()->has('idcandidat'))
        {
            Session::flush();
            #Session::regenerate();
            return view('index')->with(['statut'=> true,'message'=>'Déconnecté !']);
        }
    }

}
