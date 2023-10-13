<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class TrueRule implements Rule
{
    public function passes($attribute, $value)
    {
        return checkdate($value['month'], $value['day'], $value['year']);
    }

    public function message()
    {
        return ':attributeは有効な日付である必要があります。';
    }
}