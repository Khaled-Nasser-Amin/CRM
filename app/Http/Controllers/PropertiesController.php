<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class PropertiesController extends Controller
{
    public function properties(){
        return view('admin.properties');
    }
    public function addNewProperty(){
        return view('admin.addNewProperties');
    }
    public function store(Request $request,User $user){

    }
}
