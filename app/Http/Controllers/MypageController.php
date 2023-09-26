<?php

namespace App\Http\Controllers;

use App\Http\Requests\edituser;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MypageController extends Controller
{
    public function mypage()
    {
        return view('mypage');
    }

    public function edit(edituser $request)
    {
        
        $user = User::find(Auth::user()->id);

        
        $user->name = $request->name;
        $user->save();

        // 3
        return redirect()->route('mypage');
    }
}
