<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLeadRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            "name" => "required|string|max:255",
            "firstPhone" => "required|string|unique:leads,firstPhone,".$lead->id."|unique:leads,secondPhone,".$lead->id."|unique:employees,phone",
            "secondPhone" => "required|string|unique:leads,firstPhone,".$lead->id."|unique:leads,secondPhone,".$lead->id."|unique:employees,phone",
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
