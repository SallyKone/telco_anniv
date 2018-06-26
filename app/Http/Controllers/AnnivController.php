<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Providers\Utilitaires;

class AnnivController extends Controller
{
    //Les fonctions Get
    public function genererAnniv(Utilitaires $util)
	{
		$util->genererAnniversaire();
		$util->miseAjrCandidat();
		return view('/admins/genereranniv')->with('message','Anniversaire(s) généré(s)');
	}
}
