<?php

namespace App\Http\Controllers;
use App\Http\Requests\PropertyRequest;
use App\Http\Requests\UpdatePropertyRequest;
use App\Models\Image;
use App\Models\Project;
use App\Models\Properties;
use App\Models\User;

use App\Notifications\AddNewProperty;
use App\Notifications\DeleteProperty;
use App\Notifications\UpdateProperty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class PropertiesController extends Controller
{
    public function properties(Request $request){
        $properties=Properties::when($request->price,function ($q) use ($request){
            return $q->where('price','like','%'.$request->price.'%');
        })->when($request->location,function ($q) use ($request){
            return $q->where('location','like','%'.$request->location.'%');
        })->when($request->filter,function ($q) use ($request){
            return $request->filter == "My Properties" && auth()->user()->role != 1 ?
             $q->where('user_id',auth()->user()->id) : null;
        })->with(['images'])->latest()->paginate(6);
        return view('admin.properties.properties',compact('properties'));
    }
    public function addNewProperty(){
        $projects=Project::all();
        return view('admin.properties.addNewProperties',compact('projects'));
    }
    public function store(PropertyRequest $request,User $user){
        $data=$request->except(['images','project','amenities']);
        $property=Properties::create($data);
        $this->createGroupOfImage($request,$property);
        $user->properties()->save($property);
        $this->linkProjectWithAmenities($request,$property);
        $this->sendNotification($property,$property->project->name);
        return redirect()->back()->with(['success' => 'Created Successfully']);
    }
    public function showProperty(Properties $property){
        $user=$property->user;
        return view('admin.properties.showProperty',compact('property','user'));
    }
    public function editProperty(Properties $property){
        $this->authorize('view',$property);
        $projects=Project::all();
        return view('admin.properties.updateProperty',compact('property','projects'));
    }
    public function updateProperty(UpdatePropertyRequest $request,Properties $property){
        $this->authorize('update',$property);

        $data=$request->except(['images','project','amenities']);
        $property->update($data);
        $property->save();
        $this->ifUpdatedHasImages($request,$property);
        $property->amenities()->detach();
        $property->project()->dissociate();
        $projectName=$this->linkProjectWithAmenities($request,$property);
        $this->updateEventNotify($property,$projectName);

        return redirect()->back()->with(['success' => 'Updated Successfully']);
    }
    public function deleteProperty(Properties $property){
        $this->authorize('delete',$property);
        foreach ($property->images as $image){
            unlink('images/properties/'.$image->name);
        }
        $prop=collect($property);
        $projectName=$property->project->name;
        $this->deleteEventNotify($prop,$projectName);
        $property->delete();
        return redirect()->back()->with(['success' => 'Deleted Successfully']);
    }

    public function createGroupOfImage($request,$property){
        $files=$request->file('images');
        foreach ($files as $file){
            $fileName=time().'_'.$file->getClientOriginalName();
            $file->move(public_path('images/properties/'),$fileName);
            Image::create(['name'=>$fileName])->property()->associate($property->id)->save();
        }
    }

    public function linkProjectWithAmenities($request,$property){
        $project=Project::find($request->project);
        $project->properties()->save($property);
        foreach ($request->amenities as $amenity){
            if (in_array($amenity,$project->amenities->pluck('id')->toArray())){
                $property->amenities()->syncWithoutDetaching($amenity);
            }
        }
        return $project->name;
    }

    public function ifUpdatedHasImages($request,$property){
        if ($request->images){
            $request->validate([
                'images' => 'required|array|min:1',
                'images.*' => 'mimes:jpeg,jpg,png',
            ]);
            foreach ($property->images as $image){
                unlink('images/properties/'.$image->name);
            }
            $property->images()->delete();
            $this->createGroupOfImage($request,$property);

        }
    }

    public function sendNotification($property,$projectName = null){
        $users=User::where('id','!=',auth()->user()->id)->get();
        Notification::send($users,new AddNewProperty($property,auth()->user(),$projectName));

    }
    public function updateEventNotify($property,$projectName = null){
        $users=User::where('id','!=',auth()->user()->id)->get();
        Notification::send($users,new UpdateProperty($property,auth()->user(),$projectName));

    }
    public function deleteEventNotify($property,$projectName = null){
        $users=User::where('id','!=',auth()->user()->id)->get();
        Notification::send($users,new DeleteProperty($property,auth()->user(),$projectName));

    }

}
