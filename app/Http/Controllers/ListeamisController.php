<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ListeamisController extends Controller
{
    public function showListeamis()
    {
    	return view('listeamis');
    }
}
