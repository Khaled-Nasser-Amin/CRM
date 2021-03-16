<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function addNewProject(Request $request){
        $request->validate([
            'name'=>'required|unique:projects'
        ]);
        Project::create([
            'name' => $request->name
        ]);
        return redirect()->back();
    }
}
