<?php

namespace App\Http\Controllers;
use App\Http\Requests\PropertyRequest;
use App\Models\Properties;
use App\Models\User;

use Illuminate\Http\Request;

class PropertiesController extends Controller
{
    public function properties(Request $request){
        $properties=Properties::paginate(6);
        return view('admin.properties',compact('properties'));
    }
    public function addNewProperty(){
        return view('admin.addNewProperties');
    }
    public function store(PropertyRequest $request,User $user){
        $data=$request->except('image');
        $file=$request->file('image');
        $fileName=time().'_'.$file->getClientOriginalName();
        $file->move(public_path('properties images'),$fileName);
        $data['image']=$fileName;
        $property=Properties::create($data);
        $user->properties()->save($property);
        return redirect()->back()->with(['success' => 'Created Successfully']);
    }
    public function showProperty(Properties $property){
        dd($property);
    }
}
