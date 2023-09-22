<?php

namespace App\Http\Controllers;

use App\store_update;
use App\store;
use Illuminate\Http\Request;
use Carbon\Carbon;

class updateController extends Controller
{
    public function store_update()
    {
        $id=1;
        $store_items = \DB::table('stores')->find($id);
        $menu_items = \DB::table('menus')
        ->where('store_id', $store_items->id)->get();

        return view('store_update', [
            'menu_items' => $menu_items,
            'store_items' => $store_items,

        ]);
    }

    public function update(Request $request) {
        $user_id =1;//auth
        $store = store::firstwhere('user_id',$user_id);
        $store->opening_flag = $request->o_flag;
        $store->save();

        $id=1;
        $store_items = \DB::table('stores')->find($id);
        $menu_items = \DB::table('menus')
        ->where('store_id', $store_items->id)->get();

        return view('store_update', [
            'menu_items' => $menu_items,
            'store_items' => $store_items,

        ]);
    }
}
