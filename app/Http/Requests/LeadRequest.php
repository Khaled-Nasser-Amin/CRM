<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LeadRequest extends FormRequest
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
          "name" => "required|string|max:255",
          "firstPhone" => "required|numeric|unique:leads,firstPhone|unique:leads,secondPhone",
          "secondPhone" => "|unique:leads,firstPhone|unique:leads,secondPhone",
          "address" => "required|string",
          "city" => "required|string",
          "country" => "required|string",
          "bestTime" => "required|integer",
          "comment" => "required|string",
          "developer" => "required|string|exists:developers,id",
          "project" => "required|string|exists:projects,id",
        ];
    }
}
