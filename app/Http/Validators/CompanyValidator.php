<?php
/**
 * @file CompanyValidator.php.
 * @class CompanyValidator.
 * @date 15/01/2023 8:00 AM
 * @author Mohamed Nibras 
 */

namespace App\Http\Validators;

use Illuminate\Support\Facades\Validator;

class CompanyValidator
{
    public static function saveCompany($inputs)
    {
        $messages = [
            'name.required' => 'name is required',
        ];

        return Validator::make($inputs, [
            'name' => 'required'
        ],$messages);
    }
}