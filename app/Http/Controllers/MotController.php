<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MotController extends Controller
{
   public function showMot()
    {
    	return view('mot');
    }
}
