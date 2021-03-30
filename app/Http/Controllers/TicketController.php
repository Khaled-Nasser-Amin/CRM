<?php

namespace App\Http\Controllers;

use App\Http\Requests\TicketRequest;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index(){
        return view('admin.tickets');
    }

    public function store(TicketRequest $request){
        if (auth()->validate(['email' => $request->email,'password' => $request->password])){
            $user=User::where('email',$request->email)->first();
            $data=$request->except(['email','password']);
            $ticket=Ticket::create($data);
            $ticket->user()->associate($user->id)->save();
            return redirect()->back()->with(['success' => 'Problem Created Successfully.Thank you for helping us']);
        }else{
            return redirect()->back()->with(['success' => 'Something went wrong please try again']);
        }
    }

}
