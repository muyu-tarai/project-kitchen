<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRegister extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'store_name' => 'required|max:30',
            'store_image' => 'file|mimes:jpg,jpeg,png',
            'store_comment' => 'max:100',
            'menu_image.*' => 'mimes:jpg,jpeg,png',
            'send_menu_image' => 'present',
            'send_menu_name.*' => 'required|max:20',
            'send_menu_price.*' => 'required|integer|max:100000',
            'send_menu_comment.*' => 'max:30',
        ];
    }

    public function attributes()
    {
        return [
            'store_name' => '店舗名',
            'store_image' => '店舗画像',
            'store_comment' => '店舗紹介コメント',
            'menu_image' => 'メニュー画像',
            'send_menu_name.*' => 'メニュー名',
            'send_menu_price.*' => 'メニュー金額',
            'send_menu_comment.*' => 'メニュー紹介コメント',
        ];
    }
}
