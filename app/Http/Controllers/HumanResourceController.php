<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HumanResourceController extends Controller
{
    public function viewHumanResource(){
        return view('admin.humanResource');
    }
}
