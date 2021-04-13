<?php

namespace App\Http\Controllers;

use App\Http\Requests\LeadRequest;
use App\Http\Requests\UpdateLeadRequest;
use App\Models\Developer;
use App\Models\Lead;
use App\Models\Project;
use App\Models\User;
use App\Notifications\AddNewLead;
use App\Notifications\DeleteLead;
use App\Notifications\UpdateLead;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Illuminate\Validation\Rule;

class LeadController extends Controller
{
    public function ViewLeads(Request $request){

        $projects=Project::latest()->paginate(10);
        $developers=Developer::latest()->paginate(10);
        if (auth()->user()->role == 1){
            $statistic=Lead::select('state',DB::raw('count(*) as total'))->groupBy('state')->get();
            $statistic=collect($statistic->pluck('state')->toArray())->combine($statistic->pluck('total')->toArray());
        }else{
            $statistic=Lead::select('state',DB::raw('count(*) as total'))->where('user_id',auth()->user()->id)->groupBy('state')->get();
            $statistic=collect($statistic->pluck('state')->toArray())->combine($statistic->pluck('total')->toArray());
        }
       if (auth()->user()->role == 0) {
         $leads=  auth()->user()->leads()->when($request->search,function ($q) use($request){
               return $q->where('name','LIKE','%'.$request->search.'%')
                   ->orWhere('firstPhone','LIKE','%'.$request->search.'%')
                   ->orWhere('secondPhone','LIKE','%'.$request->search.'%')
                   ->orWhere('address','LIKE','%'.$request->search.'%')
                   ->orWhere('city','LIKE','%'.$request->search.'%')
                   ->orWhere('state','LIKE','%'.$request->search.'%')
                   ->orWhere('country','LIKE','%'.$request->search.'%')
                   ->orWhere('time','LIKE','%'.$request->search.'%')
                   ->orWhere('stageDate','LIKE','%'.$request->search.'%')
                   ->orWhere('comment','LIKE','%'.$request->search.'%');
           })->orderByDesc('created_at')->paginate(10);
          }
       else{
           $leads=Lead::join('users','leads.user_id','=','users.id')
               ->join('developers','leads.developer_id','=','developers.id')
               ->join('projects','leads.project_id','=','projects.id')
               ->when($request->search,function ($q) use($request){
                   return $q->where('leads.name','LIKE','%'.$request->search.'%')
                       ->orWhere('leads.firstPhone','LIKE','%'.$request->search.'%')
                       ->orWhere('leads.secondPhone','LIKE','%'.$request->search.'%')
                       ->orWhere('leads.address','LIKE','%'.$request->search.'%')
                       ->orWhere('leads.city','LIKE','%'.$request->search.'%')
                       ->orWhere('leads.state','LIKE','%'.$request->search.'%')
                       ->orWhere('leads.country','LIKE','%'.$request->search.'%')
                       ->orWhere('leads.time','LIKE','%'.$request->search.'%')
                       ->orWhere('leads.stageDate','LIKE','%'.$request->search.'%')
                       ->orWhere('leads.comment','LIKE','%'.$request->search.'%')
                       ->orWhere('projects.name','LIKE','%'.$request->search.'%')
                       ->orWhere('developers.name','LIKE','%'.$request->search.'%')
                       ->orWhere('users.email','LIKE','%'.$request->search.'%');
               })->orderByDesc('leads.created_at')->paginate(10);
       }

        return view('admin.leads',compact('projects','developers','leads','statistic'));
    }
    public function search($q,$request){


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
        $this->sendNotification($lead,$lead->project->name,$user);
        return redirect()->back()->with(['success' => 'Lead Created Successfully']);

    }
    public function updateLead(Request $request , Lead $lead){
        $this->authorize('update',$lead);
        $this->updateLeadRequest($request,$lead);
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
        $this->updateEventNotify($lead,$lead->project->name,$user);

        return redirect()->back()->with(['success' => 'Lead Updated Successfully']);

    }
    public function deleteLead(Lead $lead){
        $this->authorize('delete',$lead);
        $lead->invoices()->update([
            'lead_id' => null
        ]);
        $user=auth()->user()->id == 1 ? $lead->user : User::where('id',1)->first();
        $this->deleteEventNotify($lead->name,$lead->project->name,$user);
        Lead::find($lead->id)->delete();
        return redirect()->back()->with(['success' => 'Deleted Successfully']);

    }

    public function lastConnection(Request $request,Lead $lead){
        $this->authorize('update',$lead);
        $request->validate([
            'state' => ['required',Rule::in(['Not interest','Interest','Meeting','Deal Done','Follow UP','Reservation'])],
            'stageDate' => 'required|date|after:yesterday',
            'time' => 'required'
        ]);
        $data=$request->except('_token');
        $lead->state=$request->state;
        $lead->stageDate=$request->stageDate;
        $lead->time=$request->time;
        $lead->save();
        $lead->Updates()->create($data)->save();
        return redirect()->back()->with(['success' => 'Updated Successfully']);

    }

    public function updateLeadRequest($request,$lead){
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
}
    public function sendNotification($lead,$projectName = null,$userNotified){
        Notification::send($userNotified,new AddNewLead($lead,auth()->user(),$projectName));

    }
    public function updateEventNotify($lead,$projectName = null,$userNotified){
        Notification::send($userNotified,new UpdateLead($lead,auth()->user(),$projectName));

    }
    public function deleteEventNotify($lead,$projectName = null,$userNotified){
        Notification::send($userNotified,new DeleteLead($lead,auth()->user(),$projectName));

    }


}
