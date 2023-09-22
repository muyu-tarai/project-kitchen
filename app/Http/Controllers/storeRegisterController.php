<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Store;
use App\Menu;

use Illuminate\Http\Request;

class storeRegisterController extends Controller
{
    // 前のページのURL取得

    // もしユーザー登録からきてたら
    // 店舗もメニューも新規登録

    // もしログインから来てたら
    // 店舗は更新
    // メニューは元々あるやつを消したらデリート
    // ほかは新規登録

    public function storeRegisterDisplay()
    {
        $userId = 1;    //Authで取ってくる
        $a = 0;
        if ($a == 1) {
            return view('storeRegister');
        } elseif ($a == 0) {
            $store = Store::where('user_id', $userId)->first();
            $menu = Menu::where('store_id', $store->id)->get();
            return view(
                'storeRegister',
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
        $user_id = 1; //Authで取ってくる

        $storeForId = Store::create([
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
            Menu::create([
                'store_id' => $storeForId->id,
                'menu_name' => $send_menu['name'],
                'menu_image' => $request->menu_image,
                'price' => $send_menu['price'],
                'menu_comment' => $send_menu['comment'],
            ]);
        }
        return view('tmp');
    }
    public function update(Request $request)
    {
        $user_id = 1; //Authで取ってくる
        
        $store = Store::firstWhere('user_id', $user_id);
        $store->store_name = $request->store_name;
        $store->store_image = $request->store_image;
        $store->store_comment = $request->store_comment;
        $store->save();

        $postText = $request->send_menu_name;
        $item = Menu::whereNotIn('menu_name', ...[isset($postText) ? $postText : ''])->delete();

        $send_menus = [];
        for ($i = 0; $i < count($request->send_menu_name); $i++) {
            $send_menus[] = [
                "name" => $request->send_menu_name[$i],
                "price" => $request->send_menu_price[$i],
                "comment" => $request->send_menu_comment[$i]
            ];
        }

        $menus = Menu::where('store_id', $store->id)->get();


        foreach ($send_menus as $send_menu) {
            $exists = Menu::where('menu_name', $send_menu['name'])->exists();
            if (!$exists) {
                Menu::create([
                    'store_id' => $store->id,
                    'menu_name' => $send_menu['name'],
                    'menu_image' => $request->menu_image,
                    'price' => $send_menu['price'],
                    'menu_comment' => $send_menu['comment'],
                ]);
            }
        }
        return view('tmp');
    }
}
