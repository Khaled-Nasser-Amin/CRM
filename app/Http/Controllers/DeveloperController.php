<?php

namespace App\Http\Controllers;

use App\Models\Developer;
use Illuminate\Http\Request;

class DeveloperController extends Controller
{
    public function addNewDeveloper(Request $request){
        $request->validate([
            'name'=>'required|unique:developers'
        ]);
        Developer::create([
            'name'=>$request->name
        ]);
        return redirect()->back();
    }
}
