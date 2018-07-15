<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Providers\Utilitaires;
use App\Utilisateurs;
use App\Candidats;
use App\Anniversaires;
use App\Recompenses;
use App\Amis;

class AdminsController extends Controller
{
    //
	public function __construct(Utilitaires $util)
    {

    }
    public function dashbord(Utilitaires $util)
    {
    	return view('admins/index');
    }
    public function showLogin(Utilitaires $util)
    {
    	return view('admins/login');
    }
    //Connexion
    public function connexion(Request $requete){
        session()->start();
        
        $login = $requete->input('login');
        $motpass = $requete->input('mdpasse');
        
        if (DB::table('utilisateurs')->where('login','=',$login)->exists())
        {
            $utilisateur = DB::table('utilisateurs')->where('login','=',$login)->first();
            if ($motpass == $utilisateur->motpass) {
                session()->put('utlisteur',$utilisateur->id);
                session()->put('nom',$utilisateur->nom);
                session()->put('prenom',$utilisateur->prenom);
                session()->put('telephone',$utilisateur->telephone);
                session()->put('photo',$utilisateur->photo);
                //session()->save();

                return redirect('admins/index');
            }else{
                return view('admins/login')->with(['statut'=>false, 'message'=>'Mot de passe erroné ! ']);
            }
        }else{
            return view('admins/login')->with(['statut'=>false, 'message'=>'Utilisateur inconnu ! ']);
        }
    }
    //CANDIDATS
    public function showCandidat(Request $request)
    {
        $idcandidat = $request->id;
        $candidat = empty($idcandidat) ? new Candidats() : Candidats::findOrfail($idcandidat);
        
        $typepieces = DB::table('typepieces')->get();
        $pays = DB::table('pays')->get();

        $colonnes = ['Nom & Prenom', 'Numéro'];
        $lists = DB::table('amis')->join('candidats','candidats.id','=','amis.id_candidat')->select('amis.*')->where('amis.id_candidat',$idcandidat)->get();

        return view('admins/candidat')->with(['candidat'=>$candidat,'lists'=>$lists,'colonnes'=>$colonnes,'pays'=>$pays,'typepieces'=>$typepieces]);
    }
    //AMIS
    public function showAmi(Request $request)
    {
        $idami = $request->id;
        
        $candidats = DB::table('candidats')->select('candidats.id','candidats.nom','candidats.prenom','candidats.login')->get();
        
        $ami = empty($idami)? new Amis() : Amis::findOrfail($idami);

        return view('admins/ami')->with(['ami'=>$ami,'candidats'=>$candidats]);
    }
    //ANNIVERSAIRES
    public function showAnniversaire(Request $request)
    {
        $idanniv = $request->id;
        $recompenses = DB::table('recompenses')->get();
        
        $nbrparticip = DB::table('anniversaires')->leftjoin('participes','anniversaires.id','=','participes.id_anniversaire')->leftjoin('candidats','candidats.id','=','participes.id_candidat')->groupBy('anniversaires.id')->select(DB::raw('COUNT(participes.id_candidat) as nbrparticipe'))->where('anniversaires.id',$idanniv)->get();

        $legagnant = DB::table('anniversaires')->join('participes','anniversaires.id','=','participes.id_anniversaire')->join('candidats','candidats.id','=','participes.id_candidat')->select('candidats.nom','candidats.prenom')->where([['anniversaires.id','=',$idanniv],['participes.gagne','=','1']])->get();

        $anniversaire = DB::table('anniversaires')->leftjoin('recompenses','recompenses.id','=','anniversaires.id_recompense')->select('anniversaires.*',DB::raw('recompenses.photo as photo'))->where('anniversaires.id','=',$idanniv)->get();
        //dd($anniversaire);
        return view('admins/anniversaire')->with(['anniversaire'=>$anniversaire[0],'legagnant'=>$legagnant,'nbrparticipe'=>$nbrparticip[0]->nbrparticipe,'recompenses'=>$recompenses]);
    }
    //RECOMPENSES
    public function showRecompense(Request $request)
    {
        $recompense = new Recompenses();
        $listanniv = DB::table('anniversaires')->get();
        if (isset($request->id)) {
            $idrecompense = $request->id;

            $recompense = Recompenses::findOrfail($idrecompense);
            return view('admins/recompense')->with(['recompense'=>$recompense,'listanniv'=>$listanniv]);
        }
        return view('admins/recompense')->with(['recompense'=>$recompense,'listanniv'=>$listanniv]);
    }
    //Liste de tous les candidats
    public function getAllCandidats()
    {
        $nomtable = 'candidat';
        $titreliste = 'Liste de tous les candidats';
        $lists = DB::table('candidats')->leftjoin('amis','candidats.id','=','amis.id_candidat')->groupBy('candidats.id')->select(DB::raw('COUNT(amis.id_candidat) as nbramis'),'candidats.id', 'candidats.login' , 'candidats.codecandidat', 'candidats.nom', 'candidats.prenom', 'candidats.numero', 'candidats.photo', 'candidats.jour_naiss', 'candidats.mois_naiss', 'annee_naiss', 'candidats.genre', 'candidats.profil_complet')->get();
        $colonnes = ['Nom & Prenom', 'Login', 'Code', 'Jour', 'Mois', 'Année', 'Genre', 'Numéro', 'Ami(s)', 'Profil'];

        return view('admins/liste')->with(['nomtable'=>$nomtable,'titreliste'=>$titreliste,'lists'=>$lists,'colonnes'=>$colonnes]);
    }
    //Liste de tous les anniversaires
    public function getAllAnniversaires()
    {
        $nomtable = 'anniversaire';
        $titreliste = 'Liste de tous les anniversaires';
        $lists = DB::table('anniversaires')->leftjoin('participes','anniversaires.id','=','participes.id_anniversaire')->leftjoin('candidats','candidats.id','=','participes.id_candidat')->groupBy('anniversaires.id')->select(DB::raw('COUNT(participes.id_candidat) as nbrparticipe'),'anniversaires.*')->get();
        $colonnes = ['Libelle', 'Participant', 'Etat'];

        return view('admins/liste')->with(['nomtable'=>$nomtable,'titreliste'=>$titreliste,'lists'=>$lists,'colonnes'=>$colonnes]);
    }
    //Liste de tous les amis
    public function getAllAmis()
    {
        $nomtable = 'amis';
        $titreliste = 'Liste de toutes les amis';
        $lists = DB::table('amis')->join('candidats','candidats.id','=','amis.id_candidat')->select('amis.*','candidats.nom as nomc','candidats.prenom as prenomc','candidats.login')->get();
        $colonnes = ['Nom & Prenom', 'Numéro','Candidat & Login'];

        return view('admins/liste')->with(['nomtable'=>$nomtable,'titreliste'=>$titreliste,'lists'=>$lists,'colonnes'=>$colonnes]);
    }
    //Liste de tous les recompenses
    public function getAllRecompenses()
    {
        $nomtable = 'recompense';
        $titreliste = 'Liste de toutes les recompenses';
        $lists = DB::table('recompenses')->get();
        $colonnes = ['Libelle', 'Description'];

        return view('admins/liste')->with(['nomtable'=>$nomtable,'titreliste'=>$titreliste,'lists'=>$lists,'colonnes'=>$colonnes]);
    }
    public function modifierCandidat(Request $request, Utilitaires $util)
    {
        $messg=""; $avatar="";
        $idcandidat = $request->id;
        $candidat = empty($request->id) ? new Candidats() : Candidats::find($request->id);
        if (empty($idcandidat)) {
            $lelogin = strtolower($request->nom).$util->genererlogin(4);
            $codecandidat = 'tempo '.$util->genererchaine(10);
            $testeur = $util->testLoginEtCode($lelogin,$codecandidat);
            if ($testeur != -1) {
                while ($testeur) {
                    $lelogin = strtolower($request->nom).$util->genererlogin(4);
                    $codecandidat = 'tempo '.$util->genererchaine(10);
                    $testeur = $util->testLoginEtCode($lelogin,$codecandidat);
                }
                $candidat->codecandidat = $codecandidat;
                $candidat->login = $lelogin;
                $candidat->motpass = $util->genererchaine(6);
            }
             
        }
        $candidat->nom = $request->nom; 
        $candidat->prenom = $request->prenom; 
        $candidat->jour_naiss = $request->jour; 
        $candidat->mois_naiss = $request->mois; 
        $candidat->annee_naiss = $request->annee;                
        $candidat->numero = $request->numero;
        $candidat->id_typepiece = $request->idtypiece;
        $candidat->genre = $request->genre;
        $candidat->id_pays = $request->idpays;
        $candidat->numpiece = empty($request->idtypiece) ? null : $request->numpiece;

        $typepieces = DB::table('typepieces')->get();
        $pays = DB::table('pays')->get();
        $colonnes = ['Nom & Prenom', 'Numéro'];
        $lists = DB::table('amis')->join('candidats','candidats.id','=','amis.id_candidat')->select('amis.*')->where('amis.id_candidat',$idcandidat)->get();
        
        //Enregistrement d'images autiorisées
        $typepermis = ['jpg','png','jpeg'];
        $cheminacces ="images/img/avatar/";

        if($_FILES["photo"]["error"] == 0 && isset($_FILES["photo"]))
        {
            $nimg = $_FILES["photo"]["name"];
            $tabextens = pathinfo($nimg);
            $extens = $tabextens['extension'];
            $tmpimg = $_FILES["photo"]["tmp_name"];
            $typimg = $_FILES["photo"]["type"];
            $avatar = session()->get("idcandidat").session()->get("nom").".".$extens;
            $cheminacces = $cheminacces.$avatar;
            $candidat->photo = $avatar;
            $candidat->updated_at = now();

            if(2097200 > $_FILES["photo"]["size"])
            {
                if(in_array($extens, $typepermis))
                {
                    if(move_uploaded_file($tmpimg, $cheminacces))
                    {
                        if($candidats->save())
                        {
                            return view('admins/candidat')->with(['candidat'=>$candidat,'lists'=>$lists,'colonnes'=>$colonnes,'pays'=>$pays,'typepieces'=>$typepieces,'statut'=>true,'message'=>"Enregistrement effectué avec succès !!"]);
                        }else
                        {
                            return view('admins/candidat')->with(['candidat'=>$candidat,'lists'=>$lists,'colonnes'=>$colonnes,'pays'=>$pays,'typepieces'=>$typepieces,'statut'=>false,'message'=>"Impossible d'enregistrer !!"]);
                        }
                    }
                }
                else
                {
                    $messg="Choississez uniquement une image jpeg ou png";
                }
            }
            else
            {
                $messg="La taille de l'image doit être inferieure à 1 Mo";
            }
            return view('admins/candidat')->with(['candidat'=>$candidat,'lists'=>$lists,'colonnes'=>$colonnes,'pays'=>$pays,'typepieces'=>$typepieces,'message'=>$messg,'statut'=>false]);
        }
        else 
        {
            $candidat->photo = empty($idcandidat) ? "defaut.png" : $request->laphoto;
            if($candidat->save())
            {
                return view('admins/candidat')->with(['candidat'=>$candidat,'lists'=>$lists,'colonnes'=>$colonnes,'pays'=>$pays,'typepieces'=>$typepieces,'statut'=>true,'message'=>"Enregistrement effectué avec succès !!"]);
            }else
            {
                return view('admins/candidat')->with(['candidat'=>$candidat,'lists'=>$lists,'colonnes'=>$colonnes,'pays'=>$pays,'typepieces'=>$typepieces,'statut'=>false,'message'=>"Impossible d'enregistrer !!"]);
            }
        }
    }
}