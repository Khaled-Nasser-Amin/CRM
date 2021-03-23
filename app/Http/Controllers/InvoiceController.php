<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvoicesRequest;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index(){
        return view('admin.invoices');
    }

    public function store(InvoicesRequest $request){
        dd($request);
    }
}
