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
    public $menuImageToDropbox = [];
    
    public function storeRegisterDisplay()
    {
        $userId = Auth::user()->id;    //Authで取ってくる
        $store = Store::where('user_id', $userId)->first();
        if (!isset($store)) {
            return view('store_register');
        } else {
            if (isset($store->store_image)) {
                $storeImageFromDropbox = base64_encode(Storage::disk('dropbox')->get($store->store_image));
                $ext = File::extension($store->store_image);
            } else {
                $storeImageFromDropbox = base64_encode(Storage::disk('dropbox')->get('store/noImage.jpg'));
                $ext = 'jpg';
            }

            $menus = Menu::where('store_id', $store->id)->get();
            $i = 0;
            foreach($menus as $menu){
                $menus[$i]->ext = File::extension($menus[$i]->menu_image);
                if(isset($menu->menu_image)){
                $menus[$i]->menu_image = base64_encode(Storage::disk('dropbox')->get($menu->menu_image));
                }
            $i++;
        }
        return view(
            'store_register',
            [
                    'storeName' => $store->store_name,
                    'storeImage' => $storeImageFromDropbox,
                    'storeComment' => $store->store_comment,
                    'menus' => $menus,
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
        if (isset($this->storeImageToDropbox)) {
            $store->store_image = $this->storeImageToDropbox;
        }
        $store->store_comment = $request->store_comment;
        $store->save();

        $postText = $request->send_menu_name;
        if (isset($postText)) {
            Menu::where('store_id', $store->id)->whereNotIn('menu_name', [$postText ? $postText : ''])->delete();
            $send_menus = [];
            for ($i = 0; $i < count($request->send_menu_name); $i++) {
                $send_menus[] = [
                    "name" => $request->send_menu_name[$i],
                    "price" => $request->send_menu_price[$i],
                    "comment" => $request->send_menu_comment[$i]
                ];
            }

            Menu::where('store_id', $store->id)->get();

            $i = count($send_menus) - count($this->menuImageToDropbox);

            foreach ($this->menuImageToDropbox as $image) {
                $send_menus[$i]['image'] = $image;
                $i++;
            }
            foreach ($send_menus as $send_menu) {
                $exists = Menu::where('store_id', $store->id)->where('menu_name', $send_menu['name'])->exists();
                if (!$exists) {
                    if(isset($send_menu['image'])){
                    Menu::create([
                        'store_id' => $store->id,
                        'menu_name' => $send_menu['name'],
                        'menu_image' => $send_menu['image'],
                        'price' => $send_menu['price'],
                        'menu_comment' => $send_menu['comment'],
                    ]);
                }else{
                    Menu::create([
                        'store_id' => $store->id,
                        'menu_name' => $send_menu['name'],
                        'price' => $send_menu['price'],
                        'menu_comment' => $send_menu['comment'],
                    ]);
                }
                }
            }
        }
    }

    public function registerOrUpdateJudge(StoreRegister $request)
    {
        if (isset($request->menu_image)) {
            foreach ($request->file('menu_image') as $menuImage) {
                $this->menuImageToDropbox[] = Storage::disk('dropbox')->put('menu', $menuImage);
            }
        }
        if (isset($request->store_image)) {
            $this->storeImageToDropbox = Storage::disk('dropbox')->put('store', $request->store_image);
        }
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
