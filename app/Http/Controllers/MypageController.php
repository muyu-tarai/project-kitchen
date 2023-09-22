<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MypageController extends Controller
{
    public function index()
    {
        return view('mypage');
        // $users = User::all();
        // return view('mypage', ['email' => $email])
    }
}
