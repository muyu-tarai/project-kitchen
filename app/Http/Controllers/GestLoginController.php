<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GestLoginController extends Controller
{

     // ゲストログイン処理
      public function guestLogin()
     {
         
         $gest = User::find(42);
         $password = 'aaaaaaaa';
 
         return view('auth.login',['gest' => $gest, 'password' => $password]);
     }
}
