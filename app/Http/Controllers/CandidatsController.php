<?php

namespace App\Http\Controllers;
 
use App\Candidats;
use App\Anniversaires;
use App\Votes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CandidatsController extends Controller
{
    //LES FONCTIONS GET
    public function profil()
    {
    	return view('profil');
    }
    public function showModifProfil(Request $requete)
    {
        return ;
    }
    //Liste de tous les candidats
    public function getAllCandidats()
    {
    	return DB::table('candidats')->get();
    }
    //LES FONCTIONS POST
    
    //Liste des 10er candidats d'une date d'anniversai
    public function getTop10Candidats($ladate)
    {
    	$requet = DB::table('anniversaires')->join('votes', 'anniversaires.id', '=', 'votes.id_anniversaire')->join('candidats', 'candidats.id', '=', 'votes.id_candidat')
            ->selectRaw('candidats.*, anniversaires.date_anniv, COUNT(votes.id) as voix')->where([['anniversaires.date_anniv','=',$ladate],['anniversaires.anniv_cloture','=',0]])->groupBy('votes.id_candidat')->orderBy('voix','desc')->limit(10)->get();
        $requete= $requet->toSql();
        return DB::select(DB::raw($requete));
    }
}
