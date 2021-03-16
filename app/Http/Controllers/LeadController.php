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
    public function updateLead(LeadRequest $request , Lead $lead){
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
    public function deleteLead(Lead $lead){

        dd($lead);

    }


}
