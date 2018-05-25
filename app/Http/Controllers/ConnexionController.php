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
    public function connecter(Request $requete){
    	$lasession = "";
    	$candidat = new Candidats;

    	$login = $requete->input('login');
    	$motpass = $requete->input('password');
        
    	if (DB::table('candidats')->where([['login','=',$login],['motpass','=',$motpass]])->exists())
        {
            $candidat = DB::table('candidats')->where([['login','=',$login],['motpass','=',$motpass]])->get();
            $lasession = session('key');
    		return view('index')->with('masession', $lasession);
    	}

    	return view('connexion')->with('resultat', 'echoue');
    }

}
