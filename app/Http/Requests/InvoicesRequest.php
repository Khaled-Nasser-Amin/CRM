<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class InvoicesRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'lead'=>'required|exists:leads,id',
            'start'=>'required|date',
            'end'=>'required|date|after_or_equal:start',
            'broker'=>'required|exists:users,id',
            'paymentMethodology'=>['required' , Rule::in(['Cash', 'Credit','Bank'])],
            'notes'=>'required|string|max:255',
            'propertyName'=>'required|string|max:255',
            'description'=>'required|string|max:255',
            'cost'=>'required|integer',
            'quantity'=>'required|integer',
        ];
    }
}
