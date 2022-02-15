<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class logincontroller extends Controller
{
     public function viewlogin(){
    	return view('pages.login');
    }
}
