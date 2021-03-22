<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(){
        $leads=Lead::all();
        return view('admin.dashboard',compact('leads'));
    }
}
