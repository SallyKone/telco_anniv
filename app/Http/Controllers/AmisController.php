<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AmisController extends Controller
{
    public function showAmis()
    {
    	return view('amis');
    }
}
