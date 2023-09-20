<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class storeRegisterController extends Controller
{
    public function storeRegister()
    {
        return view('storeRegister');
    }

    public function tmp(Request $request)
    {
        dd($request);
        return view('tmp');
    }
}
