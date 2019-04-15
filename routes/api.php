<?php

use Illuminate\Http\Request;
use DB;
use App\Candidats;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/* Setup CORS */
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/classement', 'ClassementController@showClassement')->name('classement');

Route::get('getcandidats', function(Request $request) {
	return response()->json(["data" => DB::select("select candidats.nom as nom, candidats.prenom as prenom, candidats.login as login, candidats.numero as numero, codecandidat, DATE_FORMAT(candidats.created_at,'%d-%m-%Y %H:%i:%s') as date_inscription, count(amis.id) as nbre_amis from candidats LEFT JOIN amis on candidats.id = amis.id_candidat where DATEDIFF(candidats.created_at, '2019-04-08')>=0 GROUP BY candidats.id ORDER BY DATE_FORMAT(candidats.created_at,'%d-%m-%Y %H:%i:%s') DESC")]);
	//return [["test","test","test","test"]];
});

Route::get('statistiques', function(Request $request) {
	$result = collect();
        $days = [];
        $numbers = [];
        /*for ($i=7; $i >=0 ; $i--) { 
            $day = date('Y-m-d', strtotime('-'.$i.' days', strtotime(date('Y-m-d'))));
            //$number = count(Candidats::where('DATE_FORMAT(created_at,"%Y-%m-%d")','=',$day)->get());
	    $number = DB::select("select count(*) as nbre_candidats from candidats where DATE_FORMAT(created_at,'%Y-%m-%d')=?",[$day]); 
            array_push($days,$day);
            array_push($numbers,$number[0]->nbre_candidats);
        }*/
	$i = 0;
	do {
	    $day = date('Y-m-d', strtotime('+'.$i.' days', strtotime(date('2019-04-08'))));
            //$number = count(Candidats::where('DATE_FORMAT(created_at,"%Y-%m-%d")','=',$day)->get());
            $number = DB::select("select count(*) as nbre_candidats from candidats where DATE_FORMAT(created_at,'%Y-%m-%d')=?",[$day]); 
            array_push($days,$day);
            array_push($numbers,$number[0]->nbre_candidats);
	    $i++;
	}while($day != date('Y-m-d',strtotime(now())));
        $result->push($days);
        $result->push($numbers);
        return response()->json($result);
});

Route::get('filesize',function(Request $request) {
	return filesize("../storage/logs/fichierlog.log");
});
