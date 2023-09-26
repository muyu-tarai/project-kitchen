<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class edituser extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     *      */
    public function rules()
    {
        return [
            'name' => 'required|max:20' //
            
        ];
    }

    public function attributes()
    {
        $attributes = parent::attributes();

        return [
            'name' => 'ユーザー名',
        ];
    }
}