<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CodesController extends Controller
{
   public function showCodes()
    {
    	return view('codes');
    }
}
