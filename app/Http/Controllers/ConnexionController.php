<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConnexionController extends Controller
{
    public function showConnexion()
    {
    	return view('connexion');
    }
}
