<?php

namespace App\Http\Controllers;

use App\Amis;
use App\Candidats;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use response;

class AmisController extends Controller
{
                //Fonctions Get
    public function showChoixAmis()
    {
    	return view('choixamis');
    }

     public function showListeAmis()
    {
        if (session()->has("idcandidat")) {
            $idcandidat =  (int)session()->get("idcandidat");
            $listeamis=DB::table("amis")->where("id_candidat","=",$idcandidat)->get();
            return view('listeamis')->with("listeamis",$listeamis);
        }
    }

    public function showAjouterAmis()
    {
        return view('ajouteramis');
    }


                //Fonctions Post
    //Ajouter un ami
    public function ajouterAmis(Request $request)
    {
        $amis = new Amis;
        $amis->nom = $request->nom;
        $amis->numero = (int)$request->numero;
        $amis->id_candidat = (int)session()->get("idcandidat");
        $amis->created_at = now();
        $amis->updated_at = now();
        //dd ($amis);
        $amis->save();
        
        if($amis->save())
                {
                    return view('ajouteramis')->with(['amis'=>$amis,'statut'=>true,'message'=>"Votre ami(e) à été ajouter avec succès !!"]);
                }else
                {
                    return view('ajouteramis')->with(['amis'=>$amis,'statut'=>false,'message'=>"Impossible d'ajouter' !!"]);
                }

    }
    //Modifier un ami
    public function modifierAmis(Request $requete)
    {
    	return DB::table('amis')->where('id', $requete('id'))->update(['nom'=>$ami->nom,'numero'=>$ami->numero]);
    }
    //Supprimer un ami
    public function supprimerAmis() {
        $idami= Input::get('idami');
        $resultat = DB::table('amis')->where('id', $idami)->delete();
    	return response()->json($resultat);
    }
    //Récuperer les amis d'un candidat avec son id
    /*public function showListeAmis($idcandidat)
    {
        return view('ajouteramis');
       // return DB::table('amis')->where('id_candidat', $idcandidat)->get();
    }*/
}
