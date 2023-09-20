<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class store_view_Seeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => "テストユーザー",
            'email' => "mail@test.test",
            'email_verified_at' => Carbon::now(),
            'password' => "ssssss",
            'remember_token' => "テストユーザー",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('stores')->insert([
            'user_id' => 1,
            'store_name' => "サンプル店",
            'store_image' => "不明",
            'store_comment' => "コメントサンプル",
            'opening_flag' => 1,
            'current_location' => "不明",
            'closing_datetime' => Carbon::now(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('menus')->insert([
            'store_id' => 1,
            'menu_name' => "テストメニュー",
            'menu_image' => "不明",
            'price' => "500",
            'sold_out_flag' =>1,
            'menu_comment' =>"テストテスト",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
