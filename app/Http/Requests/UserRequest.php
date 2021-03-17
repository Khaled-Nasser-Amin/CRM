<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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


    public function rules()
    {
        return [
            'name'=> 'required|string|max:255|exists:employees,name',
            'email'=> 'required|email|max:255|unique:users|exists:employees,email',
            'phone'=> 'required|string|unique:users|exists:employees,phone',
            'serial'=> 'required|digits:4|integer|unique:users|exists:employees,serial',
            'password' => 'required|min:8',
        ];
    }
}
