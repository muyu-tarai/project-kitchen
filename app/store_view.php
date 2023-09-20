<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class store_view extends Model
{
    public function run {
    $id=
    $store_item = \DB::table('stores')->find($id);
    $store_id=
    $menu_items = \DB::table('menus')->where('store_id', $store_item->$store_id)->get();
    }
}
