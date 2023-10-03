<?php

namespace App\Requests;

use Illuminate\Validation\Validator;

class CustomValidator extends Validator
{
  /**
   * alpah_num
   *
   * @param string $attribute
   * @param string $value
   * @return true
   */
  public function validateAlphaNum($attribute, $value)
  {
    return (preg_match("/^[0-9]+$/i", $value));
  }
}