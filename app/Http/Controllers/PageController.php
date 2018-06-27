<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Providers\Utilitaires;
use App\Anniversaires;

class PageController extends Controller
{
    public function __construct(Utilitaires $advisor)
    {

    }

    public function retourne_test(Utilitaires $util)
    {
        return $util->getTop10bydate();
    }

    public function showIndex(Utilitaires $util)
    {
        $listecandidats = $util->getTop10bydate(date('Y-m-d'));
        $classement = $util->getTop10bydate(date('Y-m-d'));
        $anniversaire = DB::table('anniversaires')->leftjoin('recompenses','recompenses.id','=','anniversaires.id_recompense')->select('anniversaires.*',DB::raw('recompenses.photo as photo'))->where('anniversaires.date_anniv','=',date('Y/m/d'))->get();
        $anniversaire = isset($anniversaire[0]) ? $anniversaire[0] : new Anniversaires();

        return view('index')->with(['anniversaire'=>$anniversaire,"listecandidats"=>$listecandidats,'classement'=>$classement]);
    }
    //Fonction pour une requête ajax
    public function ajaxIndex(Request $requete, Utilitaires $util)
    {
        $listecandidats = $util->listeCandidatCompet();
        $classement = $util->getTop10bydate(date('Y-m-d'));
        $anniversaire = DB::table('anniversaires')->leftjoin('recompenses','recompenses.id','=','anniversaires.id_recompense')->select('anniversaires.*',DB::raw('recompenses.photo as photo'))->where('anniversaires.date_anniv','=',date('Y/m/d'))->get();
        $anniversaire = isset($anniversaire[0]) ? $anniversaire[0] : new Anniversaires();
        
        return response()->json(['classement'=>$classement]);
    }

    public function showVueTest(Utilitaires $util)
    {
        //session()->start();
        dd($util->getTop10bydate(now()));
    }
    public function showVueDeTest()
    {
        $candidats = DB::select("CALL SP_CANDIDAT_COMPETITION()");
        $candidathors = DB::select("CALL SP_CANDIDAT_HORSCOMPET()");
        return view('vuedetest')->with(['candidats'=>$candidats,'candidathors'=>$candidathors]);
    }

    public function description()
    {
    	return view('description');
    }

    public function showGallery()
    {
    	return view('gallery');
    }

    public function showMDPassOublier()
    {
        return view('mdpassoublier');
    }

    public function showIdOublier()
    {
    	return view('identifiantoublier');
    }

    public function showSoucritSms()
    {
    	return view('souscritsms');
    }

    public function showModifMDPass()
    {
        if (session()->has("idcandidat")) {
    	   return view('modifiermdpass');
        }
        else
        {
            return view('connexion');
        }
    }

    
    public function comptaRebour(){
    	return view('videopub');
    }
}
