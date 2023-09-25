<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Storeupdate extends FormRequest
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
            'month' => 'required|integer|between:1,12',
            'day' => 'required|integer|between:1,31',
            'time' => 'required|date_format:H:i',
        ];
    }

    public function attributes()
{
    return [
        'month' => '月',
        'day' => '日',
        'time' => '時間',
    ];
}
}
