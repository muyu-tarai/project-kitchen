<?php

namespace App\Http\Controllers;

use App\Store;
use App\Menu;

use Illuminate\Http\Request;

class storeRegisterController extends Controller
{
    public function storeRegister()
    {
        return view('storeRegister');
    }

    public function tmp(Request $request)
    {

        // フォルダモデルのインスタンスを作成する
        $store = new Store();
        $menu = new Menu();
        $user_id = 1;
        // タイトルに入力値を代入する
        $storeForId = $store->create([
            'user_id' => $user_id,
            'store_name' => $request->store_name,
            'store_image' => $request->store_image,
            'store_comment' => $request->store_comment,
        ]);
        $menu->create([
            'store_id' => $storeForId->id,
            'menu_name' => $request->menu_name,
            'menu_image' => $request->menu_image,
            'price' => $request->menu_price,
            'menu_comment' => $request->menu_comment,
        ]);
        return view('tmp');
    }
}
