<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactMessageCreated;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ContactRequest;


class ContactController extends Controller
{
    public function contact()
    {
		return view('contact');	
    }

    public function store(Request $request)
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
