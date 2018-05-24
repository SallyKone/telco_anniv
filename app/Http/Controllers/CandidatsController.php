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
    public function profil()
    {
    	return view('profil');
    }
    //Liste de tous les candidats
    public function getAllCandidats()
    {
    	return DB::table('candidats')->get();
    }
    //Fonction de test d'existance d'un candidat
    public static function existCandidat($column,$valeur){
    	$columpermis = ['id','login','motpass','codecandidat','nom_inscription','nom','prenom','numero','telephone','photo','jour_naiss','mois_naiss','annee_naiss','profil_complet','created_at','updated_at'];
    	if (in_array($column, $columpermis)) {
            if (DB::table('candidats')->whereRaw('? = ?',[$column,$valeur])->exists())
            {
                return 1;
          	}
            return 0;
    	}
      return -1;
    }
    
    //Liste des 10er candidats du jour
    public function get10CandidatToday($ladate)
    {
    	$requet = DB::table('anniversaires')->join('votes', 'anniversaires.id', '=', 'votes.id_anniversaire')->join('candidats', 'candidats.id', '=', 'votes.id_candidat')
            ->selectRaw('candidats.*, anniversaires.date_anniv, COUNT(votes.id) as voix')->where([['anniversaires.date_anniv','=',$ladate],['anniversaires.anniv_cloture','=',0]])->groupBy('votes.id_candidat')->orderBy('voix')->limit(10)->get();
        $requete= $requet->toSql();
        return DB::select(DB::raw($requete));
    }
}
