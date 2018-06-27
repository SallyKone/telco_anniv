<?php

namespace App\Http\Controllers;
 
use App\Candidats;
use App\Anniversaires;
use App\Votes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Providers\Utilitaires;

class CandidatsController extends Controller
{
    //LES FONCTIONS GET
    public function profil()
    {
    	if (session()->has("idcandidat")) {
            $idcandidat =  (int)session()->get("idcandidat");
            $candidat = Candidats::findorfail($idcandidat);
            return view('profil')->with(['candidat'=>$candidat,'statut'=>true,'message'=>"Recuperer avec succès!!"]);
        }
        else
        {
            return view('connexion');
        }
    }

    public function showModifProfil(Request $requete)
    {
        if (session()->has("idcandidat")) {
            $idcandidat =  (int)session()->get("idcandidat");
            $candidat = Candidats::findorfail($idcandidat);
            return view('modifeprofile')->with(['candidat'=>$candidat]);
        }
        else
        {
            return view('connexion');
        }
    }

    function envoyermessage(Utilitaires $util)
    {

        try
        {
            return $util->accuseReceptionORANGE("+22577120082","ça marche");
        }
        catch(\Exception $e)
        {
            return "Une erreur est survenue ".$e;
        }
            
    }

    function traitementmessage(Request $requet, Utilitaires $util)
   {
       try
       {
               $reseau = trim(str_replace(' ', '', $requet->dest));
               if($reseau==459 || $reseau==98164)
               {
                       return $this::ajouterCandidat($requet, $util);
               }
               else if($reseau==460)
               {
                       return $this::addVote($requet, $util);
               }
       }
       catch(\Exception $e)
       {
               return $e;
       }
   }
    /*function testCode(Request $requet,Utilitaires $util)
    {
        $moisnaiss=7;
        $lecodecandidat = $util->generercodecandi($moisnaiss);
        return $lecodecandidat;
    }*/
    

    //Fonction d'ajout du candidat
    function ajouterCandidat(Request $requet,Utilitaires $util)
    {
        $candidat = new Candidats();
        //Les variables
        $testeur = false; $lelogin = ""; $mdpass = ""; $lenom = ""; $leprenom = "";$datenaissaice = "";
        $journaiss = 0; $moisnaiss = 0; $messageSucces = "INSCRIPTION VALIDEE!";

        //Definitions des traitements de données
        $reseau = trim(str_replace(' ', '', $requet->dest));
        $lenumero = trim(str_replace(' ', '', $requet->source));
        $tpsrecept = $requet->time;

        
        //$lecodecandidat = 'tempo '.$util->genererchaine(10);
        
        $lesms = explode(',', $requet->msg);
        
        //Enregitrer le message reçu
        if(isset($requet->msg))
        {$util->addMessageRecu($reseau,$lenumero,$requet->msg,$tpsrecept);}
        
        if ($util->testNumCand($lenumero)) {
            $candidats = DB::table('candidats')->where('numero','=',$lenumero)->get();
            foreach ($candidats as $value) {
                $candidat = $value;
            }

            $messageSucces = "Vous etes déjà inscrit! Connectez vous avec votre\nLogin: ".$candidat->login;
            $messageSucces .= "\nMotPasse: ".$candidat->motpass."\nVia http://www.telcoanniv.com et ajoutez vos amis";
            if ($reseau == 98164) {
                $util->accuseReceptionORANGE($lenumero, $messageSucces, 98164);
	    }
            elseif ($reseau == 459){
                $util->accuseReceptionMTN($lenumero,$messageSucces,459);
            }
            $mesg = "DEJA INSCRIT!"."\nLogin: ".$candidat->login."\nVia www.telcoanniv.com Ajoutez vos amis";
            $util->addMessageEnvoye($lenumero,$reseau,$mesg,date("Y-m-d H:i:s"),'accuse');
            return view('/admins/ajoutcandidat')->with(['statut' => true,'message'=>'Candidat existant déjà avec le login '.$candidat->login]);
        }

        if(count($lesms) == 4 && $lesms[0] == 'I')
        {
            $lelogin = strtolower($lesms[1]).$util->genererlogin(4);
            $mdpass = $util->genererchaine(6);
            //$mdpassc = password_hash($mdpass,PASSWORD_DEFAULT);
            $lenom = $lesms[1];
            $leprenom = $lesms[2];
            $datenaissaice = explode('-', $lesms[3]);
            $journaiss = (int)$datenaissaice[0];
            $moisnaiss = (int)$datenaissaice[1];

            //appeler le code du candidat
            $lecodecandidat =$util->generercodecandi($moisnaiss);

            

            $testeur = $util->testLoginEtCode($lelogin, $lecodecandidat);
            if ($testeur != -1) {
                while ($testeur) {
                    $lelogin = strtolower($lesms[1]).$util->genererlogin(4);
                    $lecodecandidat = 'tempo '.$util->genererchaine(10);
                    $testeur = $util->testLoginEtCode($lelogin,$lecodecandidat);
                }
                //Appel de la fontion d'ajout du candidat 
                $candidat->login = $lelogin;
                $candidat->motpass = $mdpass;
                $candidat->codecandidat = $lecodecandidat;
                $candidat->nom_inscription = $lenom.' '.$leprenom;
                $candidat->nom = $lenom;
                $candidat->prenom = $leprenom;
                $candidat->numero = $lenumero;
                $candidat->jour_naiss = $journaiss;
                $candidat->mois_naiss = $moisnaiss;
                $candidat->photo = 'defaut.jpg';
                $candidat->created_at = now();

                if($candidat->save())
                {
                    $messageSucces .= "\nLogin: ".$lelogin;
                    $messageSucces .= "\nMot de passe: ".$mdpass;
                    $messageSucces .= "\nVia http://www.telcoanniv.com Ajoutez vos amis";
                    
                    if ($reseau == 98164) {
                        $util->accuseReceptionORANGE($lenumero, $messageSucces, 98164);
                    }
                    elseif ($reseau == 459){
                        $util->accuseReceptionMTN($lenumero,$messageSucces,459);
                    }
                    $mesg = "INSCRIPTION VALIDEE!"."\nLogin: ".$lelogin."\nMot de passe: xxxxxx"."\nVia www.telcoanniv.com Ajoutez vos amis";
                    $util->addMessageEnvoye($lenumero,$reseau,$mesg,date("Y-m-d H:i:s"),'accuse');
                    $util->miseAjrCandidat();
                    return view('/admins/ajoutcandidat')->with(['statut' => true,'message'=>'Candidat ajouté avec succès '.$requet->msg]);
                }
                else
                {
                    return view('/admins/ajoutcandidat')->with(['statut' => false,'message'=>'Impossible d\'ajouter le candidat'.$requet->msg]);
                }
            }
        }
        else{
            $fichierlog = fopen('../storage/logs/fichierlog.log', 'a+');  
            if ($fichierlog)
            {
                fputs($fichierlog,date('d-m-Y H:i:s').' Error Structure du message non conforme '.$requet->msg."\n"); 
                fclose($fichierlog);
            }
            return view('/admins/ajoutcandidat')->with(['statut' => false,'message'=>'Structure du message non conforme '.$requet->msg]);
        }  
    }

    function addVote(Request $requet, Utilitaires $util)
    {
        $vote = new Votes();
        $tableau = false;
        //Definitions des traitements de données
        $lenumero = trim(str_replace(' ', '', $requet->source));
        $codecand = trim(str_replace(' ', '', $requet->msg));
        
        $tableau = $util->idCandetAnniv($codecand);
        
        if($tableau)
        {
            //Enregistrer les données
            $vote->id_candidat = $tableau->candid;
            $vote->id_anniversaire = $tableau->anniv;
            $vote->numeroVotant = $lenumero;
            $vote->created_at = now();
            
            if($vote->save())
            {
                return view('/admins/ajoutvote')->with(['statut' => true,'message'=>'Vote Accepté ! '.$requet->msg]);
            }else{
                return view('/admins/ajoutvote')->with(['statut' => false,'message'=>'Vote Réfusé ! '.$requet->msg]);
            }
        }else {
            $fichierlog = fopen('../storage/logs/fichierlog.log', 'a+');  
            if ($fichierlog)
            {
                fputs($fichierlog,date('d-m-Y H:i:s').' Error ce code de vote n\'existe pas '.$codecand."\n"); 
                fclose($fichierlog);
            }
            return view('/admins/ajoutvote')->with(['statut' => false,'message'=>'Le code de vote est incorrect ou n\'existe pas '.$requet->msg]);
        }
    }

    //LES FONCTIONS POST
    //Retrouver identifiant
    public function recupererIdentif(Request $requete, Utilitaires $util)
    {
        $lelogin = "";
        $nom = $requete->nom;
        $telephone = '225'.$requete->phone;
        $jour = $requete->jour;
        $mois = $requete->mois;
        $msg = '';

        if(DB::table('candidats')->where([['jour_naiss','=',$jour],['mois_naiss','=',$mois],['numero','=',$telephone]])->exists())
        {
            $lelogin = DB::table('candidats')->select('login')->where([['jour_naiss','=',$jour],['mois_naiss','=',$mois],['numero','=',$telephone]])->get();
            $msg = 'Votre login : '.$lelogin;
            switch ($util->determineReseau($telephone)) {
                case 'MTN':
                    $util->accuseReceptionMTN($telephone,$msg);
                    break;
                case 'ORANGE':
                    $util->accuseReceptionORANGE($telephone,$msg);
                    break;
                case 'MOOV':
                    
                    break;
                default: ;
            }
            return view('/identifiantoublier')->with(['statut'=>true,'message'=>"Votre identifiant a été envoyé par SMS"]);
        }
        return view('/identifiantoublier')->with(['statut'=>false,'message'=>"Les données saisies ne correspondent à aucun candidat !"]);
    }
    //Retrouver le mot de passe
    public function recupererMotPass(Request $requete, Utilitaires $util)
    {
        $lemotpass = "";
        $monlogin = $requete->login;
        $telephone = '225'.$requete->phone;
        $mesg = '';
        if(DB::table('candidats')->where([['login','=',$monlogin],['numero','=',$telephone]])->exists())
        {
            $lemotpass = $util->genererchaine(6);
            DB::table('candidats')->where([['login','=',$monlogin],['numero','=',$telephone]])->update(['motpass'=>$lemotpass,'updated_at'=>now()]);
            
            $msg = 'Mot de passe: '.$lemotpass."\nConnectez vous puis modifiez le pour plus de sécurité !";
            switch ($util->determineReseau($telephone)) {
                case 'MTN':
                    $util->accuseReceptionMTN($telephone,$msg);
                    break;
                case 'ORANGE':
                    $util->accuseReceptionORANGE($telephone,$msg);
                    break;
                case 'MOOV':
                    
                    break;
                default: ;
            }
            
            return view('/mdpassoublier')->with(['statut'=>true,'message'=>"Votre mot de passe a été envoyé par SMS"]);
        }
        return view('/mdpassoublier')->with(['statut'=>false,'message'=>"Les données saisies ne correspondent à aucun candidat !"]);
    }
    //MODIFIER CANDIDATS
    public function modifProfil(Request $request)
    {
        $messg="";$avatar="";
        if (session()->has("idcandidat")) {
            $idcandidat =  (int)session()->get("idcandidat");
            $candidats = Candidats::find($idcandidat); 
            $candidats->nom = $request->nom; 
            $candidats->prenom = $request->prenom; 
            $candidats->jour_naiss = $request->jour; 
            $candidats->mois_naiss = $request->mois; 
            $candidats->annee_naiss = $request->annee;                
            $candidats->numero = $request->numero;
            
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
                $candidats->photo = $avatar;
                $candidats->updated_at = now();

                if(2097200 > $_FILES["photo"]["size"])
                {
                    if(in_array($extens, $typepermis))
                    {
                        if(move_uploaded_file($tmpimg, $cheminacces))
                        {
                            if($candidats->save())
                            {
                                return view('modifeprofile')->with(['candidat'=>$candidats,'statut'=>true,'message'=>"Modifié avec succès !!"]);
                            }else
                            {
                                return view('modifeprofile')->with(['candidat'=>$candidats,'statut'=>false,'message'=>"Impossible de modifier !!"]);
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
                    $messg="La taille de l'image doit être inferieure à 2 Mo";
                }
                return view('modifeprofile')->with(['candidat'=>$candidats,'message'=>$messg,'statut'=>false]);
            }
            else 
            {
                if($candidats->save())
                {
                    return view('modifeprofile')->with(['candidat'=>$candidats,'statut'=>true,'message'=>"Modifié avec succès !!"]);
                }else
                {
                    return view('modifeprofile')->with(['candidat'=>$candidats,'statut'=>false,'message'=>"Impossible de modifier !!"]);
                }
            }
        }
        else
        {
            return view('connexion');
        }
    }

   
}
