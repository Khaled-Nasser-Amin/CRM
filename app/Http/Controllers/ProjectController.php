<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Models\Amenity;
use App\Models\Developer;
use App\Models\Project;
use App\Models\User;
use App\Notifications\AddNewProject;
use App\Notifications\DeleteProject;
use App\Notifications\UpdateProject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:create,App\Models\User');
    }

    public function index(){
        $projects=Project::all();
        $developers=Developer::all();
        $amenities=Amenity::all();
        return view('admin.projects_and_developers',compact('projects','developers','amenities'));
    }
    public function store(ProjectRequest $request){
        $data=$request->except(['amenities','developer']);
        $project=Project::create($data);
        $project->developer()->associate($request->developer)->save();
        $project->amenities()->syncWithoutDetaching($request->amenities);
        $this->sendNotification($project,$project->developer->name);
        return redirect()->back()->with(['success' => 'Project Created Successfully']);
    }
    public function update(Request $request,Project $project)
    {
        $this->validateUpdatedRequest($request, $project);
        $data=$request->except(['amenities','developer']);
        $project->update($data);
        $project->save();
        $project->developer()->associate($request->developer)->save();
        $project->amenities()->syncWithoutDetaching($request->amenities);
        $this->updateEventNotify($project,$project->developer->name);
        return redirect()->back()->with(['success' => 'Project Updated Successfully']);
    }
    public function destroy(Project $project){
        $project->leads()->update([
            'project_id' => null
        ]);
        $pro=collect($project);
        $developerName=$project->developer->name ?? null;
        $this->deleteEventNotify($pro,$developerName);
        $project->delete();
        return redirect()->back()->with(['success' => 'Project Deleted Successfully']);

    }
    public function showProject(Project $project){
        return  $project->amenities;
    }
    public function validateUpdatedRequest($request,$project){
        $request->validate([
            'name' => 'required|string|max:255|unique:projects,name,'.$project->id,
            'developer' => 'required|string|max:255|exists:developers,id',
            'amenities' => 'required|array|min:1'
        ]);
    }

    public function sendNotification($project,$developerName = null){
        $users=User::where('id','!=',auth()->user()->id)->get();
        Notification::send($users,new AddNewProject($project,auth()->user(),$developerName));

    }
    public function updateEventNotify($project,$developerName = null){
        $users=User::where('id','!=',auth()->user()->id)->get();
        Notification::send($users,new UpdateProject($project,auth()->user(),$developerName));

    }
    public function deleteEventNotify($project,$developerName = null){
        $users=User::where('id','!=',auth()->user()->id)->get();
        Notification::send($users,new DeleteProject($project,auth()->user(),$developerName));

    }
}
