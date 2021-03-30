<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Models\Amenity;
use App\Models\Developer;
use App\Models\Project;
use Illuminate\Http\Request;

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
        return redirect()->back()->with(['success' => 'Project Updated Successfully']);

    }
    public function destroy(Project $project){

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
}
