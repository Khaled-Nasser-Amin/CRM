<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name' => 'required|string|max:255|unique:projects',
            'developer' => 'required|string|max:255|exists:developers,id',
            'amenities' => 'required|array|min:1'
        ];
    }
}
