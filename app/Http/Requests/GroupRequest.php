<?php

namespace App\Http\Requests;
use Auth;

class GroupRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(Auth::guest()) {
            return false;
        }
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
            'name' => ['required', 'min:5', 'max:255'],
            'description' => ['required', 'min:5', 'max:255'],
            'type' => ['required', 'exists:group_types']
        ];
    }
}
