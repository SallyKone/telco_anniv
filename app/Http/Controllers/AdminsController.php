<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Providers\Utilitaires;
use App\Utilisateurs;

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
}