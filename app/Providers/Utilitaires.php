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
    public function dateFr_En($chaine)
    {

        $tab = explode(' ', $chaine);
        $ladate = explode('/', $tab[0]);
        $letps = null;
        if(count($tab) > 1)
        {
            $letps = explode(':', $tab[1]);
            return ['ladate'=>$ladate,'letps'=>$letps];
        }else{
            return ['ladate'=>$ladate,'letps'=>$letps];
        }
    }
    public function determineReseau($lenumero)
    {
        $tabMTN = ['4','5','6'];
        $tabORANGE = ['7','8','9'];
        $tabMOOV = ['1','2','3'];
        $numero = str_replace(' ', '', trim($lenumero));

        if(strlen($numero) == 8){
            
            $chiffreduReseau = substr($numero, 1, 1);
            
            if(in_array($chiffreduReseau, $tabMTN))
            {
                return 'MTN';
            }
            if(in_array($chiffreduReseau, $tabORANGE))
            {
                return 'ORANGE';
            }
            if(in_array($chiffreduReseau, $tabMOOV))
            {
                return 'MOOV';
            }
        }
        elseif(strlen($numero) == 11){
            $phonereduit = substr($numero, 3);
            $chiffreduReseau = substr($phonereduit, 1, 1);

            if(in_array($chiffreduReseau, $tabMTN))
            {
                return 'MTN';
            }
            if(in_array($chiffreduReseau, $tabORANGE))
            {
                return 'ORANGE';
            }
            if(in_array($chiffreduReseau, $tabMOOV))
            {
                return 'MOOV';
            }
        }else{
            return null;
        }
    }
    //Liste des 10er candidats d'une date d'anniversaire 
    public function getTop10bydate($date)
    {

        $candidats = DB::select('select candidats.id, id_candidat, photo, nom, prenom, codecandidat, jour_naiss, mois_naiss, count(id_candidat) as nbre_vote 
            FROM votes, candidats 
            WHERE votes.id_candidat = candidats.id
            AND candidats.jour_naiss = DAY(?)
            AND candidats.mois_naiss = MONTH(?)
            and DATE_FORMAT(votes.created_at, "%Y-%m-%d") BETWEEN ADDDATE(DATE_FORMAT(?, "%Y-%m-%d"), INTERVAL -5 DAY) AND DATE_FORMAT(?, "%Y-%m-%d")
            group BY id_candidat
            order by nbre_vote DESC
            LIMIT 10', [$date,$date,$date,$date]);

        $ids = [];

        for($i=0;$i<count($candidats);$i++)
        {
            array_push($ids, $candidats[$i]->id_candidat);
        }

        $tout_les_candidats_du_jour = DB::select('select id, photo, nom, prenom, codecandidat, jour_naiss, DAY(?) as date_jour, mois_naiss
            FROM candidats
            WHERE candidats.jour_naiss = DAY(?)
            AND candidats.mois_naiss = MONTH(?)
            LIMIT 10', [$date,$date,$date,$date]);

        $candidats_non_votes = [];
        for($i=0;$i<count($tout_les_candidats_du_jour);$i++) {
            if(!in_array($tout_les_candidats_du_jour[$i]->id, $ids))
                array_push($candidats_non_votes, $tout_les_candidats_du_jour[$i]);
        };

        return [$candidats, $candidats_non_votes];

            //dd($nbre_vote) ;


    }
    //classement des candidats par periode
    public function rangCandi($lecodecandidat){
            
       
	$candidats = DB::select('select candidats.id,nom,COUNT(votes.id) as nbre_vote, codecandidat from candidats,votes where votes.id_candidat=candidats.id and jour_naiss=DAY(NOW()) and mois_naiss=MONTH(NOW()) GROUP BY candidats.id ORDER BY nbre_vote DESC',[date("%Y-%m-%d"),date("%Y-%m-%d")]);
	
	
        foreach ($candidats as $i => $candidat) {
            if($i!=0 && $candidats[$i-1]->nbre_vote==$candidat->nbre_vote)
            {
                $candidat->rang=$candidats[$i-1]->rang;   
            }
            else
                $candidat->rang = $i+1;
        }

        $candidats = collect($candidats);
	foreach ($candidats as $i => $candidat) {
            if($candidat->codecandidat == $lecodecandidat)
            {
                if(count($candidats->where("rang","=",$candidat->rang))>1)
                {
                    if($candidat->rang==1)
                    {
                        return $candidat->rang."ier ex aequo avec ".$candidat->nbre_vote." votes";
                    }
                    else
                    {
                        return $candidat->rang."ième ex aequo avec ".$candidat->nbre_vote." votes";
                    }
                }
                else
                {
                    if($candidat->rang==1)
                    {
                        return $candidat->rang."ier avec ".$candidat->nbre_vote." votes";
                    }
                    else
                    {
                        return $candidat->rang."ième avec ".$candidat->nbre_vote." votes";
                    }
                }
            }
        }

        return "Vous n'êtes pas en competition!!";

    }
    //Liste des candidats par anniversaire 
    public function getParticipantByAnniv($idanniv)
    {
        return DB::select(DB::raw('CALL SP_PARTICIPANT_BY_ANNIV(?)'),array($idanniv));
    }
    //Classement des candidats d'une date d'anniversaire 
    public function classement($ladate)
    {
        return DB::select(DB::raw('CALL SP_CLASSEMENT(?)'),array($ladate));

    }
    // liste des candidats en competition
    /*public function listeCandidatCompet ()
    {
        return DB::table('candidats')->join('votes','candidats.id','=','votes.id_candidat')->select(DB::raw('nom, prenom, codecandidat, photo'))->where("mois_naiss","=",date('m'))->where("jour_naiss","=",date('d'))->get();
    }*/

    public function genererAnniversaire()
    {
        DB::select("CALL SP_ADD_ANNIVERSAIRE()");
    }
    //Envoi d'un SMS pour attester l'inscrition du candidat
    public function accuseReceptionMTN($destinataire, $message, $espediteur = 459){
        $message = urlencode($message); 
        $url = "http://localhost:12013/cgi-bin/sendsms?username=telcoSender&password=telco12345&smsc=smsc_mtn_ci&from=$espediteur&to=$destinataire&text=$message";
        file_get_contents($url);
    }
    public function accuseReceptionORANGE($destinataire, $message, $espediteur = 98164){
        $message = urlencode($message); 
        $url = "http://localhost:11013/cgi-bin/sendsms?username=telcoSender&password=telco12345&smsc=smsc_ocit&from=$espediteur&to=$destinataire&text=$message";
        file_get_contents($url);
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
    public function generercodecandi($moisnaiss){
        $codecandi = array('jan','fev','mar','avr','mai','jui','juil','aou','sep','oct','nov','dec');
	//dd(Candidats::where('mois_naiss','=',$moisnaiss)->orderBy('created_at','desc')->first()->id);
        $nbre = count(Candidats::all());
	//$nbre = DB::table('candidats')->where('mois_naiss','=',$moisnaiss)->last()->id+1;
        $lecodecandidat = $codecandi[$moisnaiss-1].$nbre;
	while(Candidats::where('codecandidat','=',$lecodecandidat)->first()!=null) {
		$nbre++;
		$lecodecandidat = $codecandi[$moisnaiss-1].$nbre;
	}
        return $lecodecandidat;

    }
    public function genererchaine($car) {
        $chaine = "";
        //$tchaine = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijqklmnopqrstuvwxyz0123456789";
        $tchaine = "0123456789";
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

    public function testNumCand($numero){
        //Préparation de la requête
        return DB::table('candidats')->where('numero','=',$numero)->exists();
    }

    //Teste de vote 
    public function idCandetAnniv($lecodecandidat)
    {
        //Préparation de la requête
        
        $candidats_votables = [];
        for($i=0;$i<2;$i++)
        {
            $candidats_votables = array_merge($candidats_votables, $this::getTop10bydate(date('Y-m-d'))[$i]);
            $candidats_votables = array_merge($candidats_votables, $this::getTop10bydate(date('Y-m-d', strtotime("+1 day")))[$i]);
            $candidats_votables = array_merge($candidats_votables, $this::getTop10bydate(date('Y-m-d', strtotime("+2 day")))[$i]);
            $candidats_votables = array_merge($candidats_votables, $this::getTop10bydate(date('Y-m-d', strtotime("+3 day")))[$i]);
            $candidats_votables = array_merge($candidats_votables, $this::getTop10bydate(date('Y-m-d', strtotime("+4 day")))[$i]);
        }

        if(Candidats::where('codecandidat','=',$lecodecandidat)->exists())
        {
            for($i=0;$i<count($candidats_votables);$i++)
            {
                if($candidats_votables[$i]->codecandidat==$lecodecandidat)
                {
                    return $candidats_votables[$i];
                }
            }

            return "existe";
        }

        return "existe pas";
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
        DB::table('messages')->insert(['destinataire'=>$dest,'espediteur'=>$esped, 'message'=>$mesg, 'daterecu'=>$tps, 'typemsg'=>'recu']);
    }
    public function addMessageEnvoye($dest,$esped,$mesg,$tps,$typ){
        //Enregistre les données
        DB::table('messages')->insert(['destinataire'=>$dest,'espediteur'=>$esped, 'message'=>$mesg, 'dateenvoi'=>$tps, 'typemsg'=>$typ]);
    }
}
