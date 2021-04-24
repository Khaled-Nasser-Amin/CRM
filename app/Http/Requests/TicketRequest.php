<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TicketRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'password' =>'required|alpha_num|confirmed',
            'name' => 'required|max:255|string',
            'comment' => 'required|max:255|string',
            'project' => 'required|max:255|string',
        ];
    }
}
