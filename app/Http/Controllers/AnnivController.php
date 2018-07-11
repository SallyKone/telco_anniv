<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Providers\Utilitaires;
use App\Recompenses;
use App\Anniversaires;

class AnnivController extends Controller
{
    //Les fonctions Get
    public function genererAnniv(Utilitaires $util)
	{
		$util->genererAnniversaire();
		$util->miseAjrCandidat();
		return view('/admins/genereranniv')->with('message','Anniversaire(s) généré(s)');
	}
	//Modifier anniversaire
	public function modifierAnniv(Request $requete, Utilitaires $util)
	{
		$idanniv = $requete->id;
		$recompenses = DB::table('recompenses')->get();
        $unedate = $util->dateFr_En($requete->dateanniv);
		$dateanniv = implode('/', array_reverse($unedate['ladate']));
	    
	    //dd($anniversaire);
		$anniversair = Anniversaires::findOrfail($idanniv);
		$anniversair->id_recompense = $requete->idrecompense;
		$anniversair->libelle = $requete->libelle;
		$anniversair->date_anniv = date('Y-m-d',strtotime($dateanniv));
		$anniversair->updated_at = now();

		if ($anniversair->save()) {
			$nbrparticip = DB::table('anniversaires')->leftjoin('participes','anniversaires.id','=','participes.id_anniversaire')->leftjoin('candidats','candidats.id','=','participes.id_candidat')->groupBy('anniversaires.id')->select(DB::raw('COUNT(participes.id_candidat) as nbrparticipe'))->where('anniversaires.id',$idanniv)->get();

		    $legagnant = DB::table('anniversaires')->join('participes','anniversaires.id','=','participes.id_anniversaire')->join('candidats','candidats.id','=','participes.id_candidat')->select('candidats.nom','candidats.prenom')->where([['anniversaires.id','=',$idanniv],['participes.gagne','=','1']])->get();

		    $anniversaire = DB::table('anniversaires')->leftjoin('recompenses','recompenses.id','=','anniversaires.id_recompense')->select('anniversaires.*',DB::raw('recompenses.photo as photo'))->where('anniversaires.id','=',$idanniv)->get();
			$messg = 'Mise à jour effectuée avec succès';

		    return view('admins/anniversaire')->with(['anniversaire'=>$anniversaire[0],'legagnant'=>$legagnant,'nbrparticipe'=>$nbrparticip[0]->nbrparticipe,'recompenses'=>$recompenses, 'statut'=>true, 'message'=>$messg]);
		}
		$nbrparticip = DB::table('anniversaires')->leftjoin('participes','anniversaires.id','=','participes.id_anniversaire')->leftjoin('candidats','candidats.id','=','participes.id_candidat')->groupBy('anniversaires.id')->select(DB::raw('COUNT(participes.id_candidat) as nbrparticipe'))->where('anniversaires.id',$idanniv)->get();

	    $legagnant = DB::table('anniversaires')->join('participes','anniversaires.id','=','participes.id_anniversaire')->join('candidats','candidats.id','=','participes.id_candidat')->select('candidats.nom','candidats.prenom')->where([['anniversaires.id','=',$idanniv],['participes.gagne','=','1']])->get();

	    $anniversaire = DB::table('anniversaires')->leftjoin('recompenses','recompenses.id','=','anniversaires.id_recompense')->select('anniversaires.*',DB::raw('recompenses.photo as photo'))->where('anniversaires.id','=',$idanniv)->get();

		$messg = 'Erreur ! Impossible de mettre à jour';
		return view('admins/anniversaire')->with(['anniversaire'=>$anniversaire[0],'legagnant'=>$legagnant,'nbrparticipe'=>$nbrparticip[0]->nbrparticipe,'recompenses'=>$recompenses, 'statut'=>false, 'message'=>$messg]);
	}

	//Ajouter une recompense
	public function ajoutmodifRecompense(Request $requete, Utilitaires $util)
	{
		$unedate = $util->dateFr_En($requete->dateanniv);
		$dateanniv = implode('/', array_reverse($unedate['ladate']));
		$recompense = isset($requete->id)? Recompenses::findOrfail($requete->id) : new Recompenses();
		$recompense->libelle = $requete->libelle;
		$recompense->dateanniv = date('Y-m-d',strtotime($dateanniv));
		$recompense->description = $requete->description;
		
		//liste d'extensions d'images autiorisées
        $typepermis = ['jpg','png','jpeg'];
        $cheminacces ="images/cadeaux/";
		
        if($_FILES["imageRec"]["error"] == 0 && isset($_FILES["imageRec"]))
        {
            $nimg = $_FILES["imageRec"]["name"];
            $tabextens = pathinfo($nimg);
            $extens = $tabextens['extension'];
            $tmpimg = $_FILES["imageRec"]["tmp_name"];
            $typimg = $_FILES["imageRec"]["type"];
            $avatar = 'cadeau-'.date('d-m-Y',strtotime($dateanniv)).".".$extens;
            $cheminacces = $cheminacces.$avatar;
            $messg = 'Enregistré avec succès';

            if(2097200 > $_FILES["imageRec"]["size"])
            {
                if(in_array($extens, $typepermis))
                {
                    if(move_uploaded_file($tmpimg, $cheminacces))
                    {	
                    	$recompense->photo = $avatar;
                    	if(!empty($recompense->id))
				        {
				        	$messg = 'Mise à jour effectuée avec succès';
				        	$recompense->updated_at = now();
				        	if ($recompense->save()) {
								return view('admins/recompense')->with(['recompense'=>$recompense,'statut'=>true,'message'=>$messg]);
							}
				            else
				            {
				            	$messg = "Echèc ! Mise à jour impossible";
				                return view('admins/recompense')->with(['recompense'=>$recompense,'statut'=>false,'message'=>$messg]);
				            }
				        }
				        else
				        {
				        	if ($recompense->save()) {
	                    		$recompense = new Recompenses();
								return view('admins/recompense')->with(['recompense'=>$recompense,'statut'=>true,'message'=>$messg]);
							}
	                        else
	                        {
	                        	$messg = "Echèc ! Une recompense existe déjà à cette date";
	                            return view('admins/recompense')->with(['recompense'=>$recompense,'statut'=>false,'message'=>$messg]);
	                        }
	                    }
                    }else
                    {
                    	$messg = "Impossible de telecharger l'image";
                    }
                }
                else
                {
                    $messg="Choississez uniquement une image jpeg ou png";
                }
            }
            else
            {
                $messg="La taille de l'image doit être inferieure à 2 Mo";
            }
        }
        elseif(!empty($requete->imagetest) && !empty($recompense->id)){
        	$messg = 'Mise à jour effectuée avec succès';
        	$recompense->photo = $requete->imagetest;
	    	$recompense->updated_at = now();
	    	
	    	if ($recompense->save()) {
				return view('admins/recompense')->with(['recompense'=>$recompense,'statut'=>true,'message'=>$messg]);
			}
	        else
	        {
	        	$messg = "Echèc ! Mise à jour impossible";
	            return view('admins/recompense')->with(['recompense'=>$recompense,'statut'=>false,'message'=>$messg]);
	        }
        }
        else{
        	$messg = 'Erreur aucune image choisie veuillez ressayer !';
        }
        
		return view('admins/recompense')->with(['recompense'=>$recompense,'statut'=>false,'message'=>$messg]);
	}
}
