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
        // タイトルに入力値を代入する
        $store->user_id = 1;
        $store->store_name = $request->store_name;
        $store->store_image = $request->store_image;
        $store->store_comment = $request->store_comment;
        $menu->menu_name = $request->menu_name;
        $menu->menu_image = $request->menu_image;
        $menu->price = $request->menu_price;
        $menu->menu_comment = $request->menu_comment;
        // インスタンスの状態をデータベースに書き込む
        $store->save();
        $menu->save();

        return view('tmp');
    }
}
