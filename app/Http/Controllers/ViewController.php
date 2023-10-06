<?php

namespace App\Http\Controllers;

use App\store_view;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ViewController extends Controller
{
    public function view($id){
// データベースから取得
        $store_items = \DB::table('stores')->find($id);
        if(is_null($store_items)){
            return redirect()->route('index');
        }
        $menu_items = \DB::table('menus')
        ->where('store_id', $store_items->id)
        ->get();



// 日付のフォーマット
        $format_update = $store_items->updated_at;
        $carbonUpdate = Carbon::createFromFormat('Y-m-d H:i:s', $format_update)->format('Y/m/d H:i');
        if($store_items->closing_datetime==null){
            $carbon_close='不明';
        }
        else{
        $format_close = $store_items->closing_datetime;
        $carbon_close = Carbon::createFromFormat('Y-m-d H:i:s', $format_close)->format('n月j日 H:i');
        } 

// ドロップボックス用の記述
        $store_items->ext = File::extension($store_items->store_image);
            if (isset($store_items->store_image)) {
                $store_items->store_image = base64_encode(Storage::disk('dropbox')->get($store_items->store_image));
            }

            $i = 0;
        foreach ($menu_items as $menu_item) {
            $menu_items[$i]->ext = File::extension($menu_items[$i]->menu_image);
            if (isset($menu_item->menu_image)) {
                $menu_items[$i]->menu_image = base64_encode(Storage::disk('dropbox')->get($menu_item->menu_image));
            }
            $i++;
            }

// viewに数値を返す
        return view('store_view', [
            'store_items' => $store_items,
            'menu_items' => $menu_items,
            'carbonUpate' => $carbonUpdate,
            'carbon_close' => $carbon_close,
        ]);
    }
}
