<?php

namespace App\Http\Controllers;

use App\Amis;
use App\Candidats;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AmisController extends Controller
{
                //Fonctions Get
    public function showChoixAmis()
    {
    	return view('choixamis');
    }

     public function showListeAmis()
    {
        return view('listeamis');
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
        $amis->nom = $request->pseudo;
        $amis->numero = (int)$request->numero;
        $amis->id_candidat = 1;
        //dd ($amis);
        $amis->save();
        
        if($amis->save()){
            return redirect()->back()->withSuccess("Votre ami(e) a été ajouté avec succès!!!");
        }else{
            return redirect()->back()->withError("Une erreur est parvenue, veuillez recommencer");
        }

    }
    //Modifier un ami
    public function modifierAmis(Amis $ami)
    {
    	return DB::table('amis')->where('id', $requete('id'))->update(['nom'=>$ami->nom,'numero'=>$ami->numero]);
    }
    //Supprimer un ami
    public function supprimerAmis($idami)
    {
    	return DB::table('amis')->where('id', $idami)->delete();
    }
    //Récuperer les amis d'un candidat avec son id
    /*public function showListeAmis($idcandidat)
    {
        return view('ajouteramis');
       // return DB::table('amis')->where('id_candidat', $idcandidat)->get();
    }*/
}
