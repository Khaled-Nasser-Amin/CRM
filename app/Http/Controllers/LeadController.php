<?php

namespace App\Http\Controllers;

use App\Http\Requests\LeadRequest;
use App\Models\Developer;
use App\Models\Lead;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    public function ViewLeads(){
        $projects=Project::all();
        $developers=Developer::all();
        $leads=Lead::latest()->paginate(5);
        return view('admin.leads',compact('projects','developers','leads'));
    }

    public function addNewLead(LeadRequest $request){
        if ($this->authorize('create',User::class)){
            $request->validate([
                "assignedEmail" => "required|email|exists:users,email",
            ]);
            $data=$request->except(['assignedEmail','developer','project']);
            $user=User::where('email',$request->assignedEmail)->first();
        }else{
            $data=$request->except(['developer','project']);
            $user=User::auth()->user();
        }
        $lead=Lead::create($data);
        $user->leads()->save($lead);
        $lead->project()->associate($request->project)->save();
        $lead->developer()->associate($request->developer)->save();
        return redirect()->back()->with(['success' => 'Lead Created Successfully']);

    }
    public function updateLead(Request $request , Lead $lead){
        dd($request->developer);
        $request->validate([
            "name" => "required|string|max:255",
            "firstPhone" => "required|string|unique:leads,firstPhone,".$lead->id."|unique:leads,secondPhone,".$lead->id."|unique:employees,phone",
            "secondPhone" => "required|string|unique:leads,firstPhone,".$lead->id."|unique:leads,secondPhone,".$lead->id."|unique:employees,phone",
            "address" => "required|string",
            "city" => "required|string",
            "country" => "required|string",
            "bestTime" => "required|integer",
            "comment" => "required|string",
            "developer" => "required|string|exists:developers,id",
            "project" => "required|string|exists:projects,id",
        ]);
        if ($this->authorize('create',User::class)){
            $request->validate([
                "assignedEmail" => "required|email|exists:users,email",
            ]);
            $data=$request->except(['assignedEmail','developer','project']);
            $user=User::where('email',$request->assignedEmail)->first();
        }else{
            $data=$request->except(['developer','project']);
            $user=User::auth()->user();
        }

        $lead->update($data)->save();
        $lead->project()->associate($request->project)->save();
        $lead->project()->associate($user->id)->save();
        $lead->developer()->associate($request->developer)->save();
        return redirect()->back()->with(['success' => 'Lead Updated Successfully']);


    }
    public function deleteLead(Lead $lead){
        Lead::find($lead->id)->delete();
        return redirect()->back()->with(['success' => 'Deleted Successfully']);

    }


}
