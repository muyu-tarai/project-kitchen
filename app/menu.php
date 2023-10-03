<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
        'store_id', 'menu_name', 'menu_image', 'price', 'menu_comment',
    ];
}
