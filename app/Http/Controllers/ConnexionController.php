<?php

namespace App\Http\Controllers;

use App\Connectes;
use Illuminate\Http\Request;

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
    	$connecte = new Connectes;
    	$connecte->ip = $requete->input('login');
    	$connecte->timestampe = $requete->input('password');

    	if ($connecte->save()) {

    		return view('connexion')->withResultat($lemessage);
    	}
    	showConnexion();
    }

}
