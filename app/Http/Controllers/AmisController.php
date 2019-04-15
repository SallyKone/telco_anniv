<?php

namespace App\Http\Controllers;

use App\Amis;
use App\Candidats;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use response;
use App\Http\Requests\storeAmisRequest;

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
    public function ajouterModifierAmis(storeAmisRequest $requete)
    {
	/*$validatedData = $request->validate([
        	'nom' => 'required|string|max:255',
        	'numero'=>'required|numeric|size:8|unique:amis'
    	]);*/
        $idami = $requete->id;
        $ami = empty($idami) ? new Amis() : Amis::findOrfail($idami);
        $candidats = session()->has('idcandidat') ? null : DB::table('candidats')->select('candidats.id','candidats.nom','candidats.prenom','candidats.login')->get();
        $ami->nom = $requete->nom;
        $ami->numero = $requete->numero;
        $ami->id_candidat = session()->has("idcandidat") ? (int)session()->get("idcandidat") : $requete->idcandidat;
        $ami->updated_at = now();
        $lapage = session()->has("idcandidat") ? "ajouteramis" : "admins/ami";

        if($ami->save())
        {
            if (empty($idami)) {
                $ami = new Amis();
            return redirect()->back()->with(['ami'=>$ami,'candidats'=>$candidats,'statut'=>true,'message'=>"Votre ami(e) à été ajouté(e) avec succès !!"]);
            }
            else{
                return view($lapage)->with(['ami'=>$ami,'candidats'=>$candidats,'statut'=>true,'message'=>"Votre ami(e) à été mis(e) à jour avec succès !!"]);
            }
        }
        else   
        {
            if (empty($idami)) {
                return redirect()->back()->with(['ami'=>$ami,'candidats'=>$candidats,'statut'=>false,'message'=>"Impossible d'ajouter' !!"]);
            }
            else
            {
                return view($lapage)->with(['ami'=>$ami,'candidats'=>$candidats,'statut'=>false,'message'=>"Impossible de mettre à jour' !!"]);
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
