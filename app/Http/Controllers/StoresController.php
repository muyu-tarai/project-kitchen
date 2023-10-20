<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Store;

class StoresController extends Controller
{
    public function StoresControl(Request $request)
    {
        $keyword = $request->input('keyword');
        if(!empty($keyword)and $keyword != null) {
            $store_items = Store::where('store_name', 'LIKE', "%{$keyword}%")->get();
        }
        else{
            $store_items = Store::where('opening_flag','1') ;
        }


        return view('stores', [
            'stores' => $store_items,
            'keyword' => $keyword,
        ]);
    }
}
