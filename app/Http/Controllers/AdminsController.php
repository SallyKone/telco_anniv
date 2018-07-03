<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Providers\Utilitaires;

class AdminsController extends Controller
{
    //
	public function __construct(Utilitaires $advisor)
    {

    }
    public function dashbord(Utilitaires $advisor)
    {
    	return view('admins/index');
    }
    public function showLogin(Utilitaires $advisor)
    {
    	return view('admins/login');
    }
}