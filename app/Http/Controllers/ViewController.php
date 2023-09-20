<?php

namespace App\Http\Controllers;

use App\store_view;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ViewController extends Controller
{
    public function view(){
        $id=1;
        $store_items = \DB::table('stores')->find($id);
        $menu_items = \DB::table('menus')
        ->where('store_id', $store_items->id)
        ->Where('sold_out_flag', 0)
        ->get();


        $format_update = $store_items->updated_at;
        //$format_update = $format_update->format('Y年m月d日 G:i');
        return view('store_view', [
            'store_items' => $store_items,
            'menu_items' => $menu_items,
            'format_update' => $format_update,
        ]);
    }
}
