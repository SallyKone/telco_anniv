<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contact()
    {
		return view('contact');	
    }

    public function envoiMail(Request $request)
    {
    	
    	$Mailable = new ContactMessageCreated($request->nom, $request->email, $request->telephone, $request->msg);
    	Mail::to('misskone690@gmail.com')->send($Mailable);

    	/*if($Mailable->Store()){
            return redirect()->back()->withSuccess("Votre Mail a été envoyé avec succès!!!");
        }else{
            return redirect()->back()->withError("Une erreur est parvenue, veuillez recommencer");
        }*/
    }
}
