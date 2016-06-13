<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserRequest extends Request
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
            'firstname'=>['required', 'min:5', 'max:30'],
            'lastname'=>['required', 'min:5', 'max:30'],
            'birthday'=>['required', 'date'],
            'country'=>'exists:countries,country_name',
            'profileimage'=>'image'
        ];
    }
}
