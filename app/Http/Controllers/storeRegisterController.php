<?php

namespace App\Http\Controllers;

use App\Store;
use App\Menu;

use Illuminate\Http\Request;

class storeRegisterController extends Controller
{
    public function storeRegister()
    {
        $userId = 1;    //Authで取ってくる
        $a = 0;
        if ($a == 1) {
            return view('storeRegister');
        } elseif ($a == 0) {
            $store = Store::where('user_id', $userId)->first();
            $menu = Menu::where('store_id', 19)->get();
            return view('storeRegister',
                [
                    'storeName' => $store->store_name,
                    'storeImage' => $store->store_image,
                    'storeComment' => $store->store_comment,
                    'menus' => $menu
                ]
            );
        }
    }

    public function tmp(Request $request)
    {
        // フォルダモデルのインスタンスを作成する
        $store = new Store();
        $menu = new Menu();
        $user_id = 1;

        $storeForId = $store->create([
            'user_id' => $user_id,
            'store_name' => $request->store_name,
            'store_image' => $request->store_image,
            'store_comment' => $request->store_comment,
        ]);
        $send_menus = [];
        for ($i = 0; $i < count($request->send_menu_name); $i++) {
            $send_menus[] = [
                "name" => $request->send_menu_name[$i],
                "price" => $request->send_menu_price[$i],
                "comment" => $request->send_menu_comment[$i]
            ];
        }

        foreach ($send_menus as $send_menu) {
            $menu->create([
                'store_id' => $storeForId->id,
                'menu_name' => $send_menu['name'],
                'menu_image' => $request->menu_image,
                'price' => $send_menu['price'],
                'menu_comment' => $send_menu['comment'],
            ]);
        }
        return view('tmp');
    }
}
