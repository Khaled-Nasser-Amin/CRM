<?php

namespace App\Http\Controllers;

use App\Models\Developer;
use App\Models\Project;
use Illuminate\Http\Request;

class DeveloperController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:create,App\Models\User');
    }
    public function store(Request $request){
        $request->validate([
            'name'=>'required|unique:developers'
        ]);
        Developer::create([
            'name'=>$request->name
        ]);
        return redirect()->back()->with(['success' => 'Developer Created Successfully']);
    }
    public function update(Request $request,Developer $developer){
        $request->validate([
            'name'=>'required|unique:developers,name,'.$developer->id,
        ]);
        $data=$request->only('name');
        $developer->update($data);
        $developer->save();
        return redirect()->back()->with(['success' => 'Developer Updated Successfully']);


    }
    public function destroy(Developer $developer){

        $developer->delete();
        return redirect()->back()->with(['success' => 'Developer Deleted Successfully']);

    }
}
