<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\User;
class LoginRequest extends FormRequest
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
            'account'=>'required',
            'password'=>'required|min:6|max:20'
            ];
    }

    public function messages()
    {
        return[
            'account.required'=>'cannot be empty field',
            'password.required'=>'cannot be empty field',
            'password.min'=>'Passwords must be longer than 6 characters',
            'password.max'=>'Passwords not long too 20 characters'

        ];
    }
}
