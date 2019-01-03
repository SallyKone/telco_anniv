<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Providers\Utilitaires;

class ClassementController extends Controller
{
	public function __construct(Utilitaires $util)
    {

    }

    public function showClassement(Utilitaires $util)
    {
        $classement0 = $util->getTop10bydate(date('Y-m-d'));
    	$classement1 = $util->getTop10bydate(date('Y-m-d', strtotime("1 day")));
    	$classement2 = $util->getTop10bydate(date('Y-m-d', strtotime("2 day")));
    	$classement3 = $util->getTop10bydate(date('Y-m-d', strtotime("3 day")));
    	$classement4 = $util->getTop10bydate(date('Y-m-d', strtotime("4 day")));
    	
    	return view('classement')->with(['classement0'=>$classement0,'classement1'=>$classement1,'classement2'=>$classement2,'classement3'=>$classement3,'classement4'=>$classement4]);
    }
    public function monRang(Request $requete, Utilitaires $util){
        $candidat = null;
        $lecodecandidat = $requete->lecodecandidat;
        $classement0 = $util->getTop10bydate(date('Y-m-d'));
        $classement1 = $util->getTop10bydate(date('Y-m-d', strtotime("1 day")));
        $classement2 = $util->getTop10bydate(date('Y-m-d', strtotime("2 day")));
        $classement3 = $util->getTop10bydate(date('Y-m-d', strtotime("3 day")));
        $classement4 = $util->getTop10bydate(date('Y-m-d', strtotime("4 day")));
        if($util->testCode($lecodecandidat)){
            $anniv = DB::table('anniversaires')->join('participes','anniversaires.id','=','participes.id_anniversaire')->join('candidats','candidats.id', '=', 'participes.id_candidat')->select(DB::raw('anniversaires.date_anniv as dateanniv'))->where('candidats.codecandidat','=',$lecodecandidat)->first();

            $leclassement = $util->classement($anniv->dateanniv);
            foreach ($leclassement as $skey => $value) {
                if($value->codecandidat == $lecodecandidat)
                {
                    $candidat = $value;
                    $candidat->rang = $skey + 1;
                }
            }
            
            return view('classement')->with(['statut' => true,'candidat'=> $candidat,'classement0'=>$classement0,'classement1'=>$classement1,'classement2'=>$classement2,'classement3'=>$classement3,'classement4'=>$classement4]);
        }else{
            
            return view('classement')->with(['statut' => false,'message'=>"Code $lecodecandidat INVALIDE ou expiré",'classement0'=>$classement0,'classement1'=>$classement1,'classement2'=>$classement2,'classement3'=>$classement3,'classement4'=>$classement4]);
        }
    }
}
