<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Providers\Utilitaires;
use DateTime;

class ClassementController extends Controller
{
	public function __construct(Utilitaires $util)
    {

    }


    public function showClassement(Utilitaires $util )
    {

        $classement0 = $util->getTop10bydate(date('Y-m-d'))[0];
        $classement1 = $util->getTop10bydate(date('Y-m-d', strtotime("+1 day")))[0];
        $classement2 = $util->getTop10bydate(date('Y-m-d', strtotime("+2 day")))[0];
        $classement3 = $util->getTop10bydate(date('Y-m-d', strtotime("+3 day")))[0];
        $classement4 = $util->getTop10bydate(date('Y-m-d', strtotime("+4 day")))[0];

    	return view('classement')->with(['classement0'=>$classement0,'classement1'=>$classement1,'classement2'=>$classement2,'classement3'=>$classement3,'classement4'=>$classement4]);
    }
   
    public function monRang($lecodecandidat, Utilitaires $util)
    {
        $candidat = $util->rangCandi($lecodecandidat);
        return $candidat;
    }
}
