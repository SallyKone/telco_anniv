<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;
use App\Amis;

class EnvoyerMessage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sendMessage:messageRappel';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
	$candidats = DB::select('select * from candidats 
	where DATE_FORMAT(ADDDATE(?, INTERVAL 4 DAY),"%Y-%c-%d") = CONCAT(YEAR(?),"-",mois_naiss,"-",jour_naiss)',[date("Y-n-d"),date("Y-n-d")]);
	foreach($candidats as $candidat)
	{
		$amis = Amis::where('id_candidat','=',$candidat->id)->get();
		if(count($amis)>0)
		{
			foreach($amis as $ami)
			{
				echo $ami->numero."\n";
                		/*$destinataire = $ami->numero;
                		$source = "98164";
                		$message = urlencode(strtoupper("BONJOUR $ami->nom, $candidat->nom $candidat->prenom fete son anniversaire le $candidat->jour_naiss-$candidat->mois_naiss. Votez pour votre ami(e) en envoyant par sms \"").$candidat->codecandidat.strtoupper("\" au 460(206F/sms)")."\n\nwww.telcoanniv.com");
                		$url = "http://localhost:12013/cgi-bin/sendsms?username=telcoSender&password=telco12345&smsc=smsc_ocit&from=$source&to=$destinataire&text=$message";
                		file_get_contents($url);*/
			}

			echo $candidat->numero."\n";
                	/*$destinataire = $candidat->numero;
                	$source = "98164";
                	$message = urlencode(strtoupper("Bonjour $candidat->nom $candidat->prenom, votre anniversaire est prevu le $candidat->jour_naiss-$candidat->mois_naiss. Incitez vos amis a voter pour vous afin de celebrer ce jour memorable.\n\nCode de vote: ").$candidat->codecandidat);
                	$url = "http://localhost:12013/cgi-bin/sendsms?username=telcoSender&password=telco12345&smsc=smsc_ocit&from=$source&to=$destinataire&text=$message";
                	file_get_contents($url);*/
		}
		//exec("curl ".$url);
	}
        /*$url = "http://localhost:12013/cgi-bin/sendsms?username=telcoSender&password=telco12345&smsc=smsc_ocit&from=98164&to=+22577120082&text=bonjour";
        file_get_contents($url);*/
    }
}
