<?php
namespace App\Providers;
use Illuminate\Support\Facades\DB;
/**
 * 
 */
class Utilitaires
{
	//Vérification des données saisies par les utilisateurs
	public function util_test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //Liste des 10er candidats d'une date d'anniversaire
    public function getTop10bydate($ladate)
    {
    	$requet = DB::table('anniversaires')->join('votes', 'anniversaires.id', '=', 'votes.id_anniversaire')->join('candidats', 'candidats.id', '=', 'votes.id_candidat')
            ->select(DB::Raw('COUNT(votes.id) as voix, votes.id_candidat, candidats.nom, candidats.prenom, candidats.photo , candidats.codecandidat'))->where([['anniversaires.date_anniv','LIKE',$ladate],['anniversaires.anniv_cloture','=',0]])->groupBy('votes.id_candidat')->orderBy('voix','desc')->limit(10)->get();
        
        return $requet;
    }
}