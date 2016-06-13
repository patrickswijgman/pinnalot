<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Auth;

class EventRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'=>['required', 'min:3', 'max:30'],
            'description'=>['required', 'max:255'],
            'backgroundColor'=>['required', 'max:255'],
            'start'=>['required', 'date'],
            'end'=>['required', 'date', 'after:start'],
            'location'=>['required', 'min:3', 'max:255']
        ];
    }
}
