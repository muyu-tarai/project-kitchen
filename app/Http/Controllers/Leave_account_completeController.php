<?php

namespace App\Http\Controllers;
use App\Http\Requests\edituser;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Leave_account_completeController extends Controller
{
    public function leave_account_complete()
    {
        return view('leave_account_complete');  
    }
    public function edit()
    {
        $user = User::find(Auth::user()->id);

        $user->forcedelete();

        return redirect()->route('leave_account_complete');
    }

    // 3

}
