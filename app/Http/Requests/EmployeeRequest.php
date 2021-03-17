<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
            "name" => "required|string|max:255",
            "phone" => "required|string|unique:leads,firstPhone|unique:leads,secondPhone|unique:users,phone|unique:employees,phone",
            "address" => "required|string",
            "city" => "required|string",
            "country" => "required|string",
            "experience" => "required|integer",
            "zip" => "required|integer",
            "comment" => "required|string",
            "position" => "required|string|",
            "area" => "required|string|max:255",
            "email" => "required|email|max:255|unique:users|unique:employees",
            "academicStudy" => "required|string|max:255",
<<<<<<< HEAD
            'serial'=> 'required|digits:4|integer|unique:employees',
            'documentation'=> 'required|mimes:pdf,docx,doc',

=======
>>>>>>> 10e784d6263dbdd9cf9d3e67f4c04701ce940e8f
        ];
    }
}
