<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\index;

class IndexController extends Controller
{
    public function index()
    {
        $close_stores = \DB::table('stores')
        ->where('opening_flag', 0)->get();
        $open_stores = \DB::table('stores')->where('opening_flag', 1)->get();
        return view('index', [
            'close_stores' => $close_stores,
            'open_stores' => $open_stores,
        ]);
    }
}
