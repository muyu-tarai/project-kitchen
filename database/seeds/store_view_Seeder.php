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
            'store_image' => "/images/trucks/truck1.jpg",
            'store_comment' => " 当店は新鮮な材料と職人の技術を駆使して、薄くてふわふわのクレープを提供しています。甘いデザートクレープからヘルシーなサヴォリークレープまで、多彩なバリエーションが揃っており、どんな好みにも合わせられます。また、カフェメニューもご用意しており、美味しいコーヒーや紅茶を楽しむこともできます。リラックスした雰囲気の店内で、友人や家族と特別なひとときを過ごしませんか？日常の喧騒から離れて、一口で幸せを味わうために、ぜひ当店にお越しください。",
            'opening_flag' => 1,
            'current_location' => "不明",
            'closing_datetime' => Carbon::now(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('menus')->insert([
            'store_id' => 1,
            'menu_name' => "テストメニュー",
            'menu_image' => "/images/foods/Crepe1.jpg",
            'price' => "500",
            'sold_out_flag' =>1,
            'menu_comment' =>"",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
