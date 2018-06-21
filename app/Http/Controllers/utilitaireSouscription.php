<?php
	header('content-type: text/html; charset=utf-8');

    define(CANDIDAT_EN_COMPET,30240);

	//Envoi d'un SMS pour attester l'inscrition du candidat
	function accuseReceptionMTN($destinataire, $message, $espediteur = 459){
		$message = strtoupper(urlencode($message)); 
		$url = "http://localhost:11013/cgi-bin/sendsms?username=telcoSender&password=telco12345&smsc=smsc_mtn_ci&from= $espediteur&to=$destinataire&text=$message";
    }
    function accuseReceptionORANGE($destinataire, $message, $espediteur = 98164){
    	$message = strtoupper(urlencode($message)); 
		$url = "http://localhost:11013/cgi-bin/sendsms?username=telcoSender&password=telco12345&smsc=smsc_ocit&from=$espediteur&to=$destinataire&text=$message";
    }

	//Pour la génération de code aléatoirement 
	function genererchiffre($car) {
		$chaine = "";
		$tchaine = "0123456789";
		srand((double)microtime()*1000000);
		for($i=0; $i< $car; $i++) {
			$chaine .= $tchaine[rand()%strlen($tchaine)];
		}
		return $chaine;
	}
	function genererchaine($car) {
		$chaine = "";
		$tchaine = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijqklmnopqrstuvwxyz0123456789";
		srand((double)microtime()*1000000);
		for($i=0; $i< $car; $i++) {
			$chaine .= $tchaine[rand()%strlen($tchaine)];
		}
		return $chaine;
	}
	function genererlogin($car) {
		$chaine = "";
		$tchaine = "yz0123456789";
		srand((double)microtime()*1000000);
		for($i=0; $i< $car; $i++) {
			$chaine .= $tchaine[rand()%strlen($tchaine)];
		}
		return $chaine;
	}
	//Création de la connexion à la base de données
	function laconnection($lehost,$login_,$mdpass_,$labase)
	{
		try
		{
			$optionsPDO[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
			//$bdd = new PDO('mysql:host=213.136.80.39;dbname=telco_anniv', 'root', 'Lb8N2APyo9I43B6',$optionsPDO);
			return $bdd = new PDO('mysql:host='. $lehost .';dbname='. $labase, $login_, $mdpass_,$optionsPDO);
		}
		catch(Exception $e)
		{
			$fichierlog = fopen('../../../storage/logs/fichierlog.log', 'a+');
			
			if ($fichierlog)
			{
				fputs($fichierlog,date('d-m-Y H:i:s').' Error database connection : '.$e->getMessage()."\n"); 
				fclose($fichierlog);
			}
			return null;
		}
	}
	//FONCTION DE TESTE D'EXISTANCE
	function testLoginEtCode($logpropose,$codepropose){
		$bdd = laconnection('213.136.80.39','telco','telcosarl2013','telco_anniv');
		try
		{
			//Préparation de la requête
			$lareq = $bdd->prepare('SELECT id FROM candidats WHERE login = :lelogin OR codecandidat = :codepropo');
			//Enregistre les données
			$lareq->execute(array('lelogin' => $logpropose,'codepropo'=> $codepropose));
			$res = $lareq->fetchAll();
			$res = count($res);

			if ($res != 0) {
				$bdd = null;
				return true;
			}
			$bdd = null;
			return false;
		}
		catch(Exception $e)
		{
			$fichierlog = fopen('../../../storage/logs/fichierlog.log', 'a+');
			
			if ($fichierlog)
			{
				fputs($fichierlog,date('d-m-Y H:i:s').' Error test login : '.$e->getMessage()."\n");
				fclose($fichierlog);
			}
			$bdd = null;
			return -1;
		}
	}
	function testCode($codepropose){
		$bdd = laconnection('213.136.80.39','telco','telcosarl2013','telco_anniv');
		try
		{
			//Préparation de la requête
			$lareq = $bdd->prepare('SELECT id FROM candidats WHERE codecandidat = :codepropo');
			//Enregistre les données
			$lareq->execute(array('codepropo'=> $codepropose));
			$res = $lareq->fetchAll();
            $res = count($res);

			if ($res != 0) {
				$bdd = null;
				return true;
			}
			$bdd = null;
			return false;
		}
		catch(Exception $e)
		{
			$fichierlog = fopen('../../../storage/logs/fichierlog.log', 'a+');
			
			if ($fichierlog)
			{
				fputs($fichierlog,date('d-m-Y H:i:s').' Error test login : '.$e->getMessage()."\n");
				fclose($fichierlog);
			}
			$bdd = null;
			return -1;
		}
	}
	//Teste de vote 
	function idCandetAnniv($codecandidat){
		$bdd = laconnection('213.136.80.39','telco','telcosarl2013','telco_anniv');
		try
		{
			//Préparation de la requête
			$lareq = $bdd->prepare('SELECT a.id as anniv, c.id as candid FROM anniversaires a inner join participes p ON a.id = p.id_anniversaire inner join candidats c ON c.id = p.id_candidat WHERE c.codecandidat = :codecandi ;');
			//Enregistre les données
			$lareq->execute(array('codecandi'=> $codecandidat));
			$res = $lareq->fetchAll();
                        
                        if(count($res)>0)
                        {
				$bdd = null;
				return array($res[0]['candid'],$res[0]['anniv']);
			}
			$bdd = null;
			return false;
		}
		catch(Exception $e)
		{
			$fichierlog = fopen('../../../storage/logs/fichierlog.log', 'a+');
			
			if ($fichierlog)
			{
				fputs($fichierlog,date('d-m-Y H:i:s').' Error test login : '.$e->getMessage()."\n");
				fclose($fichierlog);
			}
			$bdd = null;
			return -1;
		}
	}
	function addvote($idcandidat,$idanniversaire,$numerovotant){
		$bdd = laconnection('localhost','root','','telco_anniv');
		try
		{
			//Préparation de la requête
			$lareq = $bdd->prepare('INSERT INTO Votes (id_candidat, id_anniversaire, numeroVotant, created_at,updated_at) VALUES (:idcand, :idanniv, :numero, NOW(),NOW()))');
			//Enregistre les données
			$lareq->execute(array(':idcand' => $idcandidat,  ':idanniv' => $idanniversaire, 
                            ':numero' => $numerovotant));
			$bdd = null;
		}
		catch(Exception $e)
		{
			$fichierlog = fopen('classes/log.txt', 'a+');
			
			if ($fichierlog)
			{
				fputs($fichierlog,date('d-m-Y H:i:s').' Error Send Accué sms : '.$e->getMessage()."\n"); 
				fclose($fichierlog);
			}
			$bdd = null;
		}
	}
	//Fonction de mise en competition de candidats
	function miseAjrCandidat()
	{
		$bdd = null;
		$codecandid = '';
		try
		{
			$bdd = laconnection('213.136.80.39','telco','telcosarl2013','telco_anniv');
			//Préparation de la requête
			$lareq = $bdd->prepare('CALL SP_CANDIDAT_COMPETITION()');
			//Enregistre les données
			$lareq->execute();                     
			$donnees = $lareq->fetchAll();
            $lareq->closeCursor();
            
            for ($i = 0; $i < count($donnees); $i++) 
			{
                $codecandid = genererchiffre(5);
                
                while(testCode($codecandid))
                {
                    $codecandid = genererchiffre(5);
                }
                $mareq = $bdd->prepare('UPDATE candidats SET codecandidat = :lecode, updated_at=NOW() WHERE id = :leid');
                $mareq->execute(array('lecode' => $codecandid,'leid'=> $donnees[$i]['candidat']));
			}
		}
		catch(Exception $e)
		{
			$fichierlog = fopen('../../../storage/logs/fichierlog.log', 'a+');
			
			if ($fichierlog)
			{
				fputs($fichierlog,date('d-m-Y H:i:s').' Error add in Messages : '.$e->getMessage()."\n"); 
				fclose($fichierlog);
			}
		}
		$bdd = null;
	}

	//Fonction d'ajout du candidat
	function ajouterCandidat($login_,$mdpass_,$codecandidat_,$lenom_,$leprenom_,$lenumero_,$journaiss_,$moisnaiss_)
	{
		$bdd = laconnection('213.136.80.39','telco','telcosarl2013','telco_anniv');
		$bdd->beginTransaction();
		try
		{
			//Debute une transaction
			
			//Préparation de la requête
			$lareq = $bdd->prepare('INSERT INTO Candidats (login, motpass, codecandidat, nom, prenom, numero, jour_naiss, mois_naiss, nom_inscription, photo, created_at, updated_at) VALUES (:lelogin, :mdpass, :codecandidat, :lenom, :leprenom, :lenumero, :journaiss, :moisnaiss,:nominscr,"defaut.png", NOW(), NOW())');
			//Enregistre les données
			$res = $lareq->execute(array('lelogin' => $login_,  'mdpass' => $mdpass_, 'codecandidat' => $codecandidat_, 'lenom' => $lenom_, 'leprenom' => $leprenom_, 'lenumero' => $lenumero_, 'journaiss' => $journaiss_,'moisnaiss' => $moisnaiss_,'nominscr'=> $lenom_.' '.$leprenom_));
			$bdd->commit();
			$bdd = null;
			return true;
		}
		catch(Exception $e)
		{
			$fichierlog = fopen('../../../storage/logs/fichierlog.log', 'a+');
			
			if ($fichierlog)
			{
				fputs($fichierlog,date('d-m-Y H:i:s').' Error insert candidat : '.$e->getMessage()."\n"); 
				fclose($fichierlog);
			}
			$bdd->rollBack();
			$bdd = null;
			return false;
		}
	}

	function addMessageRecu($dest,$esped,$mesg,$tps){
		$bdd = laconnection('213.136.80.39','telco','telcosarl2013','telco_anniv');
		try
		{
			//Préparation de la requête
			$lareq = $bdd->prepare('INSERT INTO Messages (espediteur, destinataire, message, daterecu, typemsg) VALUES (:espedit, :desti, :lemsg, :daterecu, :typemsg)');
			//Enregistre les données
			$res = $lareq->execute(array(':espedit' => $dest,  ':desti' => $esped, ':lemsg' => $mesg, ':daterecu' => $tps, ':typemsg' => 'recu'));
			
		}
		catch(Exception $e)
		{
			$fichierlog = fopen('../../../storage/logs/fichierlog.log', 'a+');
			
			if ($fichierlog)
			{
				fputs($fichierlog,date('d-m-Y H:i:s').' Error add in Messages : '.$e->getMessage()."\n"); 
				fclose($fichierlog);
			}
		}
		$bdd = null;
	}
	function addMessageEnvoye($dest,$esped,$mesg,$tps){
		$bdd = laconnection('213.136.80.39','telco','telcosarl2013','telco_anniv');
		try
		{
			//Préparation de la requête
			$lareq = $bdd->prepare('INSERT INTO Messages (espediteur, destinataire, message, dateenvoi, typemsg) VALUES (:espedit, :desti, :lemsg, :dateenvoi, :typemsg)');
			//Enregistre les données
			$res = $lareq->execute(array(':espedit' => $dest,  ':desti' => $esped, ':lemsg' => $mesg, ':dateenvoi' => $tps, ':typemsg' => 'accuse'));
		}
		catch(Exception $e)
		{
			$fichierlog = fopen('../../../storage/logs/fichierlog.log', 'a+');
			
			if ($fichierlog)
			{
				fputs($fichierlog,date('d-m-Y H:i:s').' Error Send Accué sms : '.$e->getMessage()."\n");
				fclose($fichierlog);
			}
		}
		$bdd = null;
	}
	
?>