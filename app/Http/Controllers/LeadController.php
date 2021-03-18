<?php

namespace App\Http\Controllers;

use App\Http\Requests\LeadRequest;
use App\Http\Requests\UpdateLeadRequest;
use App\Models\Developer;
use App\Models\Lead;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class LeadController extends Controller
{
    public function ViewLeads(){
        $projects=Project::all();
        $developers=Developer::all();
        if ($this->authorize('create',User::class)){
            $leads=Lead::latest()->get();
        }else{
           $leads=auth()->user()->leads;
        }
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
    public function updateLead(UpdateLeadRequest $request , Lead $lead){
        $this->authorize('update',$lead);
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
        $lead->project()->associate($request->project)->save();
        $lead->user()->associate($user->id)->save();
        $lead->developer()->associate($request->developer)->save();
        $lead->update($data);
        $lead->save();
        return redirect()->back()->with(['success' => 'Lead Updated Successfully']);

    }
    public function deleteLead(Lead $lead){
        $this->authorize('delete',$lead);
        Lead::find($lead->id)->delete();
        return redirect()->back()->with(['success' => 'Deleted Successfully']);

    }

    public function lastConnection(Request $request,Lead $lead){
        $this->authorize('update',$lead);
        $request->validate([
            'state' => ['required',Rule::in(['Not interest','Meeting','Deal Done','Follow UP','Reservation'])],
            'stageDate' => 'required|date|after:yesterday',
            'time' => 'required'
        ]);
        $data=$request->except('_token');
        $lead->state=$request->state;
        $lead->stageDate=$request->stateDate;
        $lead->time=$request->time;
        $lead->save();
        $lead->Updates()->create($data)->save();
        return redirect()->back()->with(['success' => 'Updated Successfully']);

    }


}
