<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRegister;
use Illuminate\Support\Facades\Auth;
use App\Store;
use App\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class storeRegisterController extends Controller
{
    public $storeImageToDropbox;
    public $menuImageToDropbox;

    public function storeRegisterDisplay()
    {
        $userId = Auth::user()->id;    //Authで取ってくる
        $store = Store::where('user_id', $userId)->first();
        $a = 1;    //ログイン画面から遷移0,ユーザー登録から遷移1
        if (!isset($store)) {
            return view('store_register');
        } else {
            $storeImageFromDropbox = base64_encode(Storage::disk('dropbox')->get($store->store_image));
            $ext = File::extension($store->store_image);

            $menu = Menu::where('store_id', $store->id)->get();

            return view(
                'store_register',
                [
                    'storeName' => $store->store_name,
                    'storeImage' => $storeImageFromDropbox,
                    'storeComment' => $store->store_comment,
                    'menus' => $menu,
                    'ext' => $ext,
                ]
            );
        }
    }


    public function registerStore($request)
    {
        $userId = Auth::user()->id;

        $storeForId = Store::create([
            'user_id' => $userId,
            'store_name' => $request->store_name,
            'store_image' => $this->storeImageToDropbox,
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


        return view('store_register_after');
    }

    public function updateStore($request)
    {
        $userId = Auth::user()->id;

        $store = Store::firstWhere('user_id', $userId);
        $store->store_name = $request->store_name;
        $store->store_image = $this->storeImageToDropbox;
        $store->store_comment = $request->store_comment;
        $store->save();

        $postText = $request->send_menu_name;
        if (isset($postText)) {
            Menu::where('store_id', $store->id)->whereNotIn('menu_name', ...[$postText ? $postText : ''])->delete();
            $send_menus = [];
            for ($i = 0; $i < count($request->send_menu_name); $i++) {
                $send_menus[] = [
                    "name" => $request->send_menu_name[$i],
                    "price" => $request->send_menu_price[$i],
                    "comment" => $request->send_menu_comment[$i]
                ];
            }

            Menu::where('store_id', $store->id)->get();


            foreach ($send_menus as $send_menu) {
                $exists = Menu::where('store_id', $store->id)->where('menu_name', $send_menu['name'])->exists();
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

            // /* Simple Put File */
            // Storage::disk('dropbox')->put('sample3.txt', "HogeHoge3");

            /* Simple Get File Content */
            // Storage::disk('local')->put('sample3.txt', $tmp);
        }
    }

    public function registerOrUpdateJudge(StoreRegister $request)
    {
        dd($request);
        foreach($request->file('send_menu_image') as $menuImage){
            dd($menuImage);
            $tmp[] = (isset($menuImage) ? $menuImage : '');
        }
        $this->storeImageToDropbox = Storage::disk('dropbox')->put('/', $request->store_image);
        $this->menuImageToDropbox = Storage::disk('dropbox')->put('/', $request->send_menu_image);
        
        $userId = Auth::user()->id;
        $store = Store::firstWhere('user_id', $userId);
        if (isset($store)) {
            $this->updateStore($request);
        } else {
            $this->registerStore($request);
        }
        
        return view('store_register_after');
    }

    public function upload()
    {
    }
}
