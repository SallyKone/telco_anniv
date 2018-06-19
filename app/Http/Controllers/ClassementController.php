<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\Utilitaires;

class ClassementController extends Controller
{
	public function __construct(Utilitaires $advisor)
    {

    }

    public function showClassement(Utilitaires $advisor)
    {
    	$classement1 = $advisor->getTop10bydate(date('Y-m-d'));
    	$classement2 = $advisor->getTop10bydate(date('Y-m-d'));
    	$classement3 = $advisor->getTop10bydate(date('Y-m-d'));
    	$classement4 = $advisor->getTop10bydate(date('Y-m-d'));
    	$classement5 = $advisor->getTop10bydate(date('Y-m-d'));
    	
    	return view('classement')->with(['classement1'=>$classement1,'classement2'=>$classement2,'classement3'=>$classement3,'classement4'=>$classement4]);
    }
}
