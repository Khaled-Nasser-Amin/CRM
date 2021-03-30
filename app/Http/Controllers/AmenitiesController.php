<?php

namespace App\Http\Controllers;

use App\Models\Amenity;
use Illuminate\Http\Request;

class AmenitiesController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:create,App\Models\User');
    }
    public function store(Request $request){
        $request->validate([
            'name'=>'required|unique:amenities'
        ]);
        Amenity::create([
            'name'=>$request->name
        ]);
        return redirect()->back()->with(['success' => 'Amenity Created Successfully']);
    }
    public function update(Request $request,Amenity $amenity){
        $request->validate([
            'name'=>'required|unique:developers,name,'.$amenity->id,
        ]);
        $data=$request->only('name');
        $amenity->update($data);
        $amenity->save();
        return redirect()->back()->with(['success' => 'Amenity Updated Successfully']);


    }
    public function destroy(Amenity $amenity){

        $amenity->delete();
        return redirect()->back()->with(['success' => 'Amenity Deleted Successfully']);

    }
}
