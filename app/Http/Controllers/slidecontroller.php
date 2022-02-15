<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class slidecontroller extends Controller
{
    public function index(){
    	return view('adminpages.banner.listbanner');
    }
}
