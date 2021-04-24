<?php

namespace App\Http\Controllers;

use App\Http\Requests\TicketRequest;
use App\Models\Ticket;
use App\Models\User;
use App\Notifications\AddNewTicket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;

class TicketController extends Controller
{
    public function index(){
        return view('admin.tickets');
    }

    public function store(TicketRequest $request){
        if (Hash::check($request->password,auth()->user()->password)){
            $data=$request->except(['email','password']);
            $ticket=Ticket::create($data);
            auth()->user()->tickets()->save($ticket);
            if (auth()->user()->id == 1 ){
                $userNotified=User::where('id','!=',1)->get();
            }else{
                $userNotified=User::where('id',1)->first();
            }
            $this->sendNotification($ticket,$userNotified);
            return redirect()->back()->with(['success' => 'Problem Created Successfully.Thank you for helping us']);
        }else{
            return redirect()->back()->withErrors(['password'=>'Invalid Password please try again']);
        }
    }

    public function sendNotification($ticket,$userNotified){
        Notification::send($userNotified,new AddNewTicket($ticket,auth()->user()));

    }

}
