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
        $email = 'gest@gmail.com';
        $gest = User::where('email', $email)->first();
        $password = 'gestlogin';

        return view('auth.login',['gest' => $gest, 'password' => $password]);
    }
}
