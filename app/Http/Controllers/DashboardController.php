<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Lead;
use App\Models\Project;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function dashboard()
    {
        if(auth()->user()->role == 1){
           return $this->DashboardForAdmin();
        }else {
           return $this->DashboardForUser();
        }


    }

    public function DashboardForAdmin(){

            $leads = Lead::all();
            $numberOfLeads = $leads->count();
            $invoices = Invoice::count();
            $tickets = Ticket::latest()->get();
            $projects = Project::withCount('leads')->orderBy('leads_count', 'DESC')->pluck('name', 'leads_count')->take(5)->toArray();
            $dataStatistic=[];
            $sumOfOthers=0;
            foreach ($projects as $key =>$value){
                if($numberOfLeads){
                    $dataStatistic[]=[$value => ($key*100)/$numberOfLeads];
                    $sumOfOthers+=(($key*100)/$numberOfLeads);
                }
            }
            $sumOfOthers =100-$sumOfOthers;
            $dataStatistic=collect($dataStatistic)->collapse();
            return view('admin.dashboard', compact('leads', 'invoices', 'tickets','dataStatistic','sumOfOthers'));
    }
    public function DashboardForUser(){
        $user=auth()->user();
        $leads = $user->leads;
        $numberOfLeads = $leads->count();
        $invoices = $user->invoices;
        $tickets = Ticket::where('id',1)->orWhere('id',auth()->user()->id)->latest()->get();
        $projects = $user->projects()->pluck('projects.name','projects.id')->unique();
        $sumOfOthers=0;
        $dataStatistic=['' => ''];
        foreach ($projects as $key => $value){
            if($numberOfLeads) {
                $count = $user->leads->where('project_id', $key)->count();
                $precent[] = ($count * 100) / $numberOfLeads;
                $projectsName[] = $value;
            }
        }
        if($numberOfLeads) {
            $sumOfOthers =100-collect($precent)->sum();
            $dataStatistic=collect($projectsName)->combine($precent);
        }

        return view('admin.dashboard', compact('leads', 'invoices', 'tickets','dataStatistic','sumOfOthers'));

    }
}
