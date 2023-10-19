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
            $storeImageFromDropbox = base64_encode(Storage::disk('dropbox')->get('store/noImage.jpg'));
            $ext = 'jpg';
            return view('store_register', [
                'storeImage' => $storeImageFromDropbox,
                'ext' => $ext
            ]);
        } else {
            $storeImageFromDropbox = base64_encode(Storage::disk('dropbox')->get($store->store_image));
            $ext = File::extension($store->store_image);
            $menus = Menu::where('store_id', $store->id)->get();
            $i = 0;
            foreach ($menus as $menu) {
                $menus[$i]->ext = File::extension($menus[$i]->menu_image);
                if (isset($menu->menu_image)) {
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

        Store::create([
            'user_id' => $userId,
            'store_name' => $request->store_name,
            'store_image' => $this->storeImageToDropbox,
            'store_comment' => $request->store_comment,
        ]);

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
    }

    public function registerOrUpdateJudge(StoreRegister $request)
    {
        $userId = Auth::user()->id;
        $store = Store::firstWhere('user_id', $userId);
        if (isset($request->menu_image)) {
            foreach ($request->file('menu_image') as $menuImage) {
                $this->menuImageToDropbox[] = Storage::disk('dropbox')->put('menu', $menuImage);
            }
        } else {
            $this->menuImageToDropbox[] = "store/noImage.jpg";
        }

        if (isset($request->store_image)) {
            if ($store->store_image != "store/noImage.jpg") {
                Storage::disk('dropbox')->delete($store->store_image);
            }
            $this->storeImageToDropbox = Storage::disk('dropbox')->put('store', $request->store_image);
        } else {
            $this->storeImageToDropbox = "store/noImage.jpg";
        }

        if (isset($store)) {
            $this->updateStore($request);
        } else {
            $this->registerStore($request);
        }

        $store = Store::firstWhere('user_id', $userId);
        $postText = $request->send_menu_name;
        // if($store->store_image != "store/noImage.jpg"){
        //     Storage::delete($store->store_image);
        // }
        if (isset($postText)) {
            $deleteMenuImages = Menu::where('store_id', $store->id)->whereNotIn('menu_name', ...[$postText ? $postText : ''])->get();
            foreach ($deleteMenuImages as $deleteMenuImage) {
                if ($deleteMenuImage->menu_image != "store/noImage.jpg") {
                    Storage::disk('dropbox')->delete($deleteMenuImage->menu_image);
                }
            }
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

            $i = count($send_menus) - count($this->menuImageToDropbox);

            foreach ($this->menuImageToDropbox as $image) {
                $send_menus[$i]['image'] = $image;
                $i++;
            }
            foreach ($send_menus as $send_menu) {
                $exists = Menu::where('store_id', $store->id)->where('menu_name', $send_menu['name'])->exists();
                if (!$exists) {
                    if (isset($send_menu['image'])) {
                        Menu::create([
                            'store_id' => $store->id,
                            'menu_name' => $send_menu['name'],
                            'menu_image' => $send_menu['image'],
                            'price' => $send_menu['price'],
                            'menu_comment' => $send_menu['comment'],
                        ]);
                    }
                }
            }
        }

        return redirect('store_update');
    }
}
