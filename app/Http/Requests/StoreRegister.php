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
            'store_name' => 'required',
            'store_image' => 'file|mimes:jpg,jpeg,png',
            'menu_image' => 'file|mimes:jpg,jpeg,png',
            'menu_price' => 'required|alpha_num',
            'send_menu_image' => 'present',
            'send_menu_name' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'store_name' => '店舗名',
            'file' => 'ファイル',
            'send_menu_name' => 'メニュー名',
        ];
    }
}
