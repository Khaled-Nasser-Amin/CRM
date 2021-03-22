<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePropertyRequest extends FormRequest
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
            'project' => 'required|exists:projects,id',
            'amenities' => 'required|array|min:1',
        ];
    }
}
