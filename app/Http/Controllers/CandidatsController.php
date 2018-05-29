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
    public function showModifProfil()
    {
        return view('modifeprofile');;
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

    public function modifProfil (Request $request ) {


        $candidats = Candidats::find(1); 
        $candidats->nom = $request->nom; 
        $candidats->prenom = $request->prenom; 
        $candidats->jour_naiss = $request->jour; 
        $candidats->mois_naiss = $request->mois; 
        $candidats->annee_naiss = $request->annee;
        $candidats->photo = $request->photo;                
        $candidats->telephone = $request->telephone; 

         $candidats->save();

        if($candidats->save()){
            return redirect()->back()->withSuccess("Votre profil  a été modifié avec succès!!!");
        }else{
            return redirect()->back()->withError("Une erreur est parvenue, veuillez recommencer");
        }


    }
}
