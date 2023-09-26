<?php

namespace App\Http\Controllers;

use App\store_view;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ViewController extends Controller
{
    public function view(){
        $id=1;
        $store_items = \DB::table('stores')->find($id);
        $menu_items = \DB::table('menus')
        ->where('store_id', $store_items->id)
        ->get();


        $format_update = $store_items->updated_at;
        $carbonUpdate = Carbon::createFromFormat('Y-m-d H:i:s', $format_update)->format('Y/m/d H:i');
        $format_close = $store_items->closing_datetime;
        $carbon_close = Carbon::createFromFormat('Y-m-d H:i:s', $format_close)->format('n月j日 H:i');

        return view('store_view', [
            'store_items' => $store_items,
            'menu_items' => $menu_items,
            'carbonUpate' => $carbonUpdate,
            'carbon_close' => $carbon_close,
        ]);
    }
}
