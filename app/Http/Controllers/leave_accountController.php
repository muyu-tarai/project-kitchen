<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class leave_accountController extends Controller
{
public function leave_account()
{
    return view('leave_account');
}
}