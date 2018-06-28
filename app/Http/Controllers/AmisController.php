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

    public function showAjouterAmis(Request $requet)
    {
        $ami = new Amis();
        //dd(empty($requet->id));
        if(!empty($requet->id)){
            $ami = Amis::findOrfail($requet->id);
            return view('ajouteramis')->with('ami',$ami);
        }else{
            return view('ajouteramis')->with('ami',$ami);
        }
    }


                //Fonctions Post
    //Ajouter ou Modifier un ami
    public function ajouterModifierAmis(Request $requete)
    {
        $ami = new Amis();
        if(empty($requete->id));
        {
            $ami->nom = $requete->nom;
            $ami->numero = $requete->numero;
            $ami->id_candidat = (int)session()->get("idcandidat");
            $ami->created_at = now();
            $ami->updated_at = now();
            
            if($ami->save())
            {
                $ami = new Amis();
                return view('ajouteramis')->with(['ami'=>$ami,'statut'=>true,'message'=>"Votre ami(e) à été ajouter avec succès !!"]);
            }else
            {
                return view('ajouteramis')->with(['ami'=>$ami,'statut'=>false,'message'=>"Impossible d'ajouter' !!"]);
            }
        }
        if(!empty($requete->id))
        {
            $ami = Amis::find($requete->id);
            $ami->nom = $requete->nom;
            $ami->numero = $requete->numero;
            $ami->updated_at = now();
            if($ami->save())
            {
                return view('ajouteramis')->with(['ami'=>$ami,'statut'=>true,'message'=>"Votre ami(e) à été mis(e) à jour avec succès !!"]);
            }else
            {
                return view('ajouteramis')->with(['ami'=>$ami,'statut'=>false,'message'=>"Impossible de mettre à jour' !!"]);
            }
        }
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
