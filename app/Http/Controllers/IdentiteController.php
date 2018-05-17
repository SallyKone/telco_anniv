<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IdentiteController extends Controller
{
    public function showIdentite()
    {
    	return view('identite');
    }
}
