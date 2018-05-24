<?php

namespace App\Http\Controllers;

use App\Amis;
use App\Candidats;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AmisController extends Controller
{
    public function showAmis()
    {
    	return view('amis');
    }

    //Récuperer les amis d'un candidat avec son id
    public function getAllAmisById($idcandidat)
    {
    	return DB::table('amis')->where('id_candidat', $idcandidat)->get();
    }
    //Ajouter un ami
    public function ajouterAmi(Amis $ami)
    {
    	return DB::table('amis')->insertGetId(['nom'=>$ami->nom,'numero'=>$ami->numero,'id_candidat'=>$ami->idcandidat]);
    }
    //Modifier un ami
    public function modifierAmi(Amis $ami)
    {
    	return DB::table('amis')->where('id', $requete('id'))->update(['nom'=>$ami->nom,'numero'=>$ami->numero]);
    }
    //Supprimer un ami
    public function supprimerAmi($idami)
    {
    	return DB::table('amis')->where('id', $idami)->delete();
    }
}
