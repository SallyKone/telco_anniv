<?php
	header( 'content-type: text/html; charset=utf-8' );
	include('utilitaireSouscription.php');

	$basedd = null;
	$testeur = false;
	$lelogin = "";
	$mdpass = "";
	$lenom = "";
	$leprenom = "";
	$datenaissaice = "";
	$journaiss = 0;
	$moisnaiss = 0;
	$messageSucces = "INSCRIPTION VALIDEE!";


	//Definitions des traitements de données
	$reseau = trim(str_replace(' ', '', $_GET['dest']));
	$lenumero = trim(str_replace(' ', '', $_GET['source']));
	$tpsrecept = $_GET['time'];

	$codecandidat = 'tempo '.genererchaine(10);
	
	$lesms = explode(',', $_GET['msg']);
	
	//Enregitrer le message reçu utf8_encode
	addMessageRecu($reseau,$lenumero,$_GET['msg'],$tpsrecept);

	if(count($lesms) == 4 && $lesms[0] == 'I')
	{
		$lelogin = strtolower($lesms[1]).genererlogin(4);
		$mdpass = genererchaine(6);
		//$mdpassc = password_hash($mdpass,PASSWORD_DEFAULT);
		$lenom = $lesms[1];
		$leprenom = $lesms[2];
		$datenaissaice = explode('-', $lesms[3]);
		$journaiss = (int)$datenaissaice[0];
		$moisnaiss = (int)$datenaissaice[1];

		$testeur = testLoginEtCode($lelogin,$codecandidat);
		if ($testeur != -1) {
			while ($testeur) {
				$lelogin = strtolower($lesms[1]).genererlogin(4);
				$codecandidat = 'tempo '.genererchaine(10);
			 	$testeur = testLoginEtCode($lelogin,$codecandidat);
			}
			//Appel de la fontion d'ajout du candidat		
			ajouterCandidat($lelogin,$mdpass,$codecandidat,$lenom,$leprenom,$lenumero,$journaiss,$moisnaiss);
			$messageSucces .= "\nLogin: ".$lelogin;
			$messageSucces .= "\nVia www.telcoanniv.com Ajoutez vos amis";
			
			if ($reseau = 98164) {
				accuseReceptionORANGE($lenumero, $messageSucces, 98164);
			}
			else{
				accuseReceptionMTN($lenumero,$messageSucces,459);
			}
			$mesg = "INSCRIPTION VALIDEE!"."\nLogin: ".$lelogin."\nMot de passe: xxxxxx"."\nVia www.telcoanniv.com Ajoutez vos amis";
			addMessageEnvoye($lenumero,$reseau,$mesg,date("Y-m-d H:i:s"));
			miseAjrCandidat();
		}
	}
	else
	{
		$tableau = false;
		//Definitions des traitements de données
		$lenumero = trim(str_replace(' ', '', $_GET['source']));
		$codecand = trim(str_replace(' ', '', $_GET['msg']));
        
        $tableau = idCandetAnniv($codecand);
        
        if($tableau)
        {
            addvote($tableau[0],$tableau[1],$lenumero);
        } else {
            $fichierlog = fopen('../../../storage/logs/fichierlog.log', 'a+');	
			if ($fichierlog)
			{
				fputs($fichierlog,date('d-m-Y H:i:s').' Error ce code de vote n\'existe pas ou structure non conforme: '.$_GET['msg']."\n"); 
				fclose($fichierlog);
			}
        }
    }
?>