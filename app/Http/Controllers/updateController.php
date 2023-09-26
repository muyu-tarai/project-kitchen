<?php

namespace App\Http\Controllers;

use App\store_update;
use App\store;
use App\menu;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Requests\Storeupdate; 

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

    public function update(Storeupdate $request) {
        $user_id =1;//auth
        $data = $request->year. '-' .$request->month. '-' .$request->day. ' ' .$request->time;

        // $carbon = Carbon::create('Y-m-d H:i' ,$data);

        if($request->o_flag == 0){
            $store = store::firstwhere('user_id',$user_id);
            $store->opening_flag = $request->o_flag;
            $store->save();
        }
        else if($request->o_flag == 1){
            $store = store::firstwhere('user_id',$user_id);
            $store->opening_flag = $request->o_flag;
            $store->current_location = $request->locate;
            $store->closing_datetime = $data;
            $store->save();

            for($i=0; $i < count($request->menu_id); $i++){
                $menu = menu::firstwhere('id',$request->menu_id[$i]);
                $menu->sold_out_flag = $request->menu_flag[$i];
                $menu->save();
            }
        }


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
