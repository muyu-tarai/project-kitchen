<?php

namespace App\Http\Controllers;

use App\Store;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\index;
use Illuminate\Support\Facades\File;

class IndexController extends Controller
{
    public function index()
    {
        $closeStores = Store::where('opening_flag', 0)->get();
        $openStores = Store::where('opening_flag', 1)->get();

        foreach ($openStores as $key => $store) {
            $openStores[$key]->ext = File::extension($store->store_image);
            $openStoreImageFromDropbox = base64_encode(Storage::disk('dropbox')->get($store->store_image));
            $openStores[$key]->store_image = $openStoreImageFromDropbox;
        }
        foreach ($closeStores as $key => $store) {
            $closeStores[$key]->ext = File::extension($store->store_image);
            $closeStoreImageFromDropbox = base64_encode(Storage::disk('dropbox')->get($store->store_image));
            $closeStores[$key]->store_image = $closeStoreImageFromDropbox;
        }
        return view('index', [
            'close_stores' => $closeStores,
            'open_stores' => $openStores,
        ]);
    }
}
