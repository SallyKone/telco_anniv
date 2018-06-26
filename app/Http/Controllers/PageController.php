<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Providers\Utilitaires;

class PageController extends Controller
{
    public function __construct(Utilitaires $advisor)
    {

    }
    public function showIndex()
    {
        return view('index');
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
    	return view('modifiermdpass');
    }
    
    public function comptaRebour(){
    	
		$tpsrestant=mktime(0, 0, 0, 6, 1, 2018)-time();
    	return ($tpsrestant <= 0) ? view('index') : view('compterebour',['letemps'=>$tpsrestant]);
    }
}
