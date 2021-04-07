<?php

namespace App\Http\Controllers;

use App\Models\Developer;
use App\Models\Project;
use App\Models\User;
use App\Notifications\AddNewDeveloper;
use App\Notifications\DeleteDeveloper;
use App\Notifications\UpdateDeveloper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

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
        $developer=Developer::create([
            'name'=>$request->name
        ]);
        $this->sendNotification($developer);

        return redirect()->back()->with(['success' => 'Developer Created Successfully']);
    }
    public function update(Request $request,Developer $developer){
        $request->validate([
            'name'=>'required|unique:developers,name,'.$developer->id,
        ]);
        $data=$request->only('name');
        $developer->update($data);
        $developer->save();
        $this->updateEventNotify($developer);

        return redirect()->back()->with(['success' => 'Developer Updated Successfully']);


    }
    public function delete(Developer $developer){
        $dev=collect($developer);
        $this->deleteEventNotify($dev);
        $developer->projects()->update([
            'developer_id' => null
        ]);
        $developer->leads()->update([
            'developer_id' => null
        ]);
        $developer->delete();
        return redirect()->back()->with(['success' => 'Developer Deleted Successfully']);

    }

    public function sendNotification($developer){
        $users=User::where('id','!=',auth()->user()->id)->get();
        Notification::send($users,new AddNewDeveloper($developer,auth()->user()));

    }
    public function updateEventNotify($developer){
        $users=User::where('id','!=',auth()->user()->id)->get();
        Notification::send($users,new UpdateDeveloper($developer,auth()->user()));

    }
    public function deleteEventNotify($developer){
        $users=User::where('id','!=',auth()->user()->id)->get();
        Notification::send($users,new DeleteDeveloper($developer,auth()->user()));

    }
}
