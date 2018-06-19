<?php
	include('utilitaireSouscription.php');
	$bdd = null;
	try
	{
		$optionsPDO[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
		//$bdd = new PDO('mysql:host=213.136.80.39;dbname=telco_anniv', 'root', 'Lb8N2APyo9I43B6',$optionsPDO);
		$bdd = new PDO('mysql:host=localhost;dbname=telco_anniv', 'root', '',$optionsPDO);
		//Préparation de la requête
		$lreq = $bdd->prepare('CALL SP_ADD_ANNIVERSAIRE()');
		//Enregistre les données
		$lreq->execute();
		$lreq->closeCursor();
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
	miseAjrCandidat();
?>