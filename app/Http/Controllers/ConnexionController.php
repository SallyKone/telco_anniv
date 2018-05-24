<?php

namespace App\Http\Controllers;
 
use App\Candidats;
use App\Http\Controllers\Controllers;
use App\Http\Controllers\CandidatsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConnexionController extends Controller
{
    
	//Lors d'une requete d'affichage de la page de connexion
    public function showConnexion()
    {
    	return view('connexion');
    }

    //Lors d'une requete get
    public function getFrom(Request $requete){
    	return view('connexion');
    }

    //Lors d'une requete post
    public function postForm(Request $requete){
    	$lemessage= "Enregistrer avec succès";
    	$candidat = new Candidats;

    	$login = $requete->input('login');
    	$motpass = $requete->input('password');
        
    	if (DB::table('candidats')->where([['login','=',$login],['motpass','=',$motpass]])->exists())
        {
            $candidat = DB::table('candidats')->where([['login','=',$login],['motpass','=',$motpass]])->get();
    		return view('index');
    	}

    	return view('connexion')->with('resultat', 'echoue');
    }

}
