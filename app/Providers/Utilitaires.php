<?php
namespace App\Providers;

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
    
	//Envoi d'un SMS pour attester l'inscrition du candidat
	public function accuseReceptionMTN($destinataire, $message, $espediteur = 98){

    }
    public function accuseReceptionORANGE($destinataire, $message, $espediteur = 98){
    	$message = strtoupper(urlencode($message)); 
		$url = "http://localhost:11013/cgi-bin/sendsms?username=telcoSender&password=telco12345&smsc=smsc_ocit&from=$dest&to=$telephone&text=$message";  
		$fp = @fopen($url, "r");
		if ($fp) 
			fclose($fp);
    }
}