<?php

namespace App\Http\Controllers;

use App\Models\Amenity;
use App\Models\User;
use App\Notifications\AddNewAmenity;
use App\Notifications\DeleteAmenity;
use App\Notifications\UpdateAmenity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

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
        $amenity=Amenity::create([
            'name'=>$request->name
        ]);
        $this->sendNotification($amenity);

        return redirect()->back()->with(['success' => 'Amenity Created Successfully']);
    }
    public function update(Request $request,Amenity $amenity){
        $request->validate([
            'name'=>'required|unique:developers,name,'.$amenity->id,
        ]);
        $data=$request->only('name');
        $amenity->update($data);
        $amenity->save();
        $this->updateEventNotify($amenity);

        return redirect()->back()->with(['success' => 'Amenity Updated Successfully']);


    }
    public function delete(Amenity $amenity){
        $ame=collect($amenity);;
        $this->deleteEventNotify($ame);
        $amenity->delete();
        return redirect()->back()->with(['success' => 'Amenity Deleted Successfully']);

    }

    public function sendNotification($amenity){
        $users=User::where('id','!=',auth()->user()->id)->get();
        Notification::send($users,new AddNewAmenity($amenity,auth()->user()));

    }
    public function updateEventNotify($amenity){
        $users=User::where('id','!=',auth()->user()->id)->get();
        Notification::send($users,new UpdateAmenity($amenity,auth()->user()));

    }
    public function deleteEventNotify($amenity){
        $users=User::where('id','!=',auth()->user()->id)->get();
        Notification::send($users,new DeleteAmenity($amenity,auth()->user()));

    }
}
