<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    function logout(){
      if( Auth::check()){
        Auth::logout();
      }

      return redirect()->back() ;
    }
}
