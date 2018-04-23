<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutController extends Controller
{
    // public function logout(Request $Request)
    // {
    //     session()->flush();
    //     return view('/landing');
    // }
    public function logout(){
    	$error_code= null;
    	session()->flush();
    	return view('/landing',compact('error_code'));
    }
}
