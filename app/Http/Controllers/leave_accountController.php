<?php

namespace App\Http\Controllers;
use App\Http\Requests\edituser;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class Leave_accountController extends Controller
{
public function leave_account()
{
    return view('leave_account');
}
public function edit()
    {
        $user = User::find(Auth::user()->id);

        $user->forcedelete();

        return redirect()->route('leave_account_complete');
    }
}