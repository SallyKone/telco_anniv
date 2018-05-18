<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AfterloginController extends Controller
{
    public function showAfterlogin()
    {
    	return view('afterlogin');
    }
}
