<?php
namespace App\Providers;
use App\Candidats;
use App\Messages;
use Illuminate\Support\Facades\DB;
/**
 * 
 */
class Utilitaires
{
	//Vérification des données saisies par les utilisateurs
	public function util_test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //Liste des 10er candidats d'une date d'anniversaire , votes.id_candidat, candidats.nom, candidats.prenom, candidats.photo , candidats.codecandidat
    public function getTop10bydate($ladate)
    {
    	return DB::select(DB::raw('CALL GET_TOP10_BY_DATE(?)'),array($ladate));
    }

    public function genererAnniversaire()
    {
        DB::select("CALL SP_ADD_ANNIVERSAIRE()");
    }
    //Envoi d'un SMS pour attester l'inscrition du candidat
    public function accuseReceptionMTN($destinataire, $message, $espediteur = 459){
        $message = strtoupper(urlencode($message)); 
        $url = "http://localhost:11013/cgi-bin/sendsms?username=telcoSender&password=telco12345&smsc=smsc_mtn_ci&from= $espediteur&to=$destinataire&text=$message";
    }
    public function accuseReceptionORANGE($destinataire, $message, $espediteur = 98164){
        $message = strtoupper(urlencode($message)); 
        $url = "http://localhost:11013/cgi-bin/sendsms?username=telcoSender&password=telco12345&smsc=smsc_ocit&from=$espediteur&to=$destinataire&text=$message";
    }

    //Pour la génération de code aléatoirement 
    public function genererchiffre($car) {
        $chaine = "";
        $tchaine = "0123456789";
        srand((double)microtime()*1000000);
        for($i=0; $i< $car; $i++) {
            $chaine .= $tchaine[rand()%strlen($tchaine)];
        }
        return $chaine;
    }
    public function genererchaine($car) {
        $chaine = "";
        $tchaine = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijqklmnopqrstuvwxyz0123456789";
        srand((double)microtime()*1000000);
        for($i=0; $i< $car; $i++) {
            $chaine .= $tchaine[rand()%strlen($tchaine)];
        }
        return $chaine;
    }
    public function genererlogin($car) {
        $chaine = "";
        $tchaine = "yz0123456789";
        srand((double)microtime()*1000000);
        for($i=0; $i< $car; $i++) {
            $chaine .= $tchaine[rand()%strlen($tchaine)];
        }
        return $chaine;
    }
    
    //FONCTION DE TESTE D'EXISTANCE
    public function testLoginEtCode($logpropose,$codepropose){
        //Préparation de la requête
        return DB::table('candidats')->where([['login','=',$logpropose],['codecandidat','=',$codepropose]])->exists();
    }

    public function testCode($codepropose){
        //Préparation de la requête
        return DB::table('candidats')->where('codecandidat','=',$codepropose)->exists();
    }

    //Teste de vote 
    public function idCandetAnniv($lecodecandidat){
        //Préparation de la requête
        if(DB::table('anniversaires')->join('participes','anniversaires.id', '=', 'participes.id_anniversaire')->join('candidats','candidats.id', '=', 'participes.id_candidat')->where('candidats.codecandidat','=',$lecodecandidat)->exists())
        {
            return DB::table('anniversaires')->join('participes','anniversaires.id', '=', 'participes.id_anniversaire')->join('candidats','candidats.id', '=', 'participes.id_candidat')->select(DB::raw('candidats.id as candid,anniversaires.id as anniv'))->where('candidats.codecandidat','=',$lecodecandidat)->first();
        }
        return false;
    }
    
    //Fonction de mise en competition de candidats
    public function miseAjrCandidat()
    {
        $codecandid = '';
        $candidats = DB::select("CALL SP_CANDIDAT_COMPETITION()");
        $candidathors = DB::select("CALL SP_CANDIDAT_HORSCOMPET()");
        
        //Mets en compétition les candidats
        foreach ($candidats as $valeur) 
        {

            $codecandid = $this->genererchiffre(5);
            while($this->testCode($codecandid))
            {
                $codecandid = $this->genererchiffre(5);
            }
            DB::table('candidats')->where('id','=',$valeur->candidat)->update(['codecandidat'=>$codecandid,'updated_at'=>now()]);
        }

        //Mets hors compétition les candidats
        foreach ($candidathors as $valeurh) 
        {
            $codecandid = 'tempo '.$this->genererchaine(10);
            while($this->testCode($codecandid))
            {
                $codecandid = 'tempo '.$this->genererchaine(10);
            }
            DB::table('candidats')->where('id','=',$valeurh->candidat)->update(['codecandidat'=>$codecandid,'updated_at'=>now()]);
        }
    }

    public function addMessageRecu($dest,$esped,$mesg,$tps){
        //Enregistre les données
        DB::table('Messages')->insert(['destinataire'=>$dest,'espediteur'=>$esped, 'message'=>$mesg, 'daterecu'=>$tps, 'typemsg'=>'recu']);
    }
    public function addMessageEnvoye($dest,$esped,$mesg,$tps,$typ){
        //Enregistre les données
        DB::table('Messages')->insert(['destinataire'=>$dest,'espediteur'=>$esped, 'message'=>$mesg, 'dateenvoi'=>$tps, 'typemsg'=>$typ]);
    }
}