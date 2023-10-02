<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\store_update;
use App\store;
use App\menu;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Requests\Storeupdate;
use Error;

class updateController extends Controller
{
    public function store_update()
    {
        // // 現在認証しているユーザーを取得
        // $user = Auth::user();

        // // 現在認証しているユーザーのIDを取得
        // $id = Auth::id();
        $id= 1;
        $store_items = \DB::table('stores')->find($id);
        $menu_items = \DB::table('menus')
        ->where('store_id', $store_items->id)->get();

        //条件分岐　フラグの受け渡しを入れる
        return view('store_update', [
            'menu_items' => $menu_items,
            'store_items' => $store_items,

        ]);
    }

    public function update(Storeupdate $request) {
        // // 現在認証しているユーザーを取得
        // $user = Auth::user();
        // // 現在認証しているユーザーのIDを取得
        // $id = Auth::id();
        $id= 1;
        $data = $request->year. '-' .$request->month. '-' .$request->day. ' ' .$request->time;

        // $carbon = Carbon::create('Y-m-d H:i' ,$data);

        if($request->o_flag == 0){
            $store = store::firstwhere('user_id',$id);
            $store->opening_flag = $request->o_flag;
            $store->save();
        }
        else if($request->o_flag == 1){
            $store = store::firstwhere('user_id',$id);
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

        $store_items = \DB::table('stores')->find($id);
        $menu_items = \DB::table('menus')
        ->where('store_id', $store_items->id)->get();

        return view('store_update', [
            'menu_items' => $menu_items,
            'store_items' => $store_items,
        ]);
    }
}
