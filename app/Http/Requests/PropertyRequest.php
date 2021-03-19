<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropertyRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'type' => 'required|string|max:20',
            'price' => 'required|integer',
            'bedrooms' => 'required|integer',
            'square' => 'required|integer',
            'carParking' => 'required|integer',
            'image' => 'required|mimes:jpeg,jpg,png',
        ];
    }
}
