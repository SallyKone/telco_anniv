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

    public function envoiMail(Request $request)
    {
    	
    	$Mailable = new ContactMessageCreated($request->nom, $request->email, $request->telephone, $request->msg);
    	Mail::to('misskone690@gmail.com')->send($Mailable);

    	return view('index');
        
    }
}
