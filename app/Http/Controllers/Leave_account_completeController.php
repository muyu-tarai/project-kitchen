<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Leave_account_completeController extends Controller
{

    public function leave_account_complete()
    {
        return view('leave_account_complete');
    }
    public function delete(Request $request)
    {
        $currentUserEmail = auth()->user()->email;
        $inputEmail = $request->input('email');
        // dd($inputEmail);
        if ($currentUserEmail === $inputEmail) {
            // メールアドレスが一致
            $user = User::find(Auth::id());
            $user->forcedelete();
            return view('leave_account_complete');
        } else {
            // メールアドレスが一致しない
            $error = 'メールアドレスが違います';
            return view('leave_account',['error'=> $error]);
        }
    }
}
