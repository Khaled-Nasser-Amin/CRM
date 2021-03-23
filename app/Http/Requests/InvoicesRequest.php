<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvoicesRequest extends FormRequest
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
            'customerName'=>'required|string|max:255',
            'invoiceSerial'=>'required|numeric|unique:invoices',
            'start'=>'required|date|format:Y:m:d|',
            'end'=>'required|date|format:Y:m:d|after:start',
            'employeeEmail'=>'required|email',
            'paymentMethodology'=>'required|string|max:255',
            'notes'=>'required|string|max:255',
            'propertyName'=>'required|string|max:255',
            'description'=>'required|string|max:255',
            'cost'=>'required|integer',
            'quantity'=>'required|integer',
        ];
    }
}
