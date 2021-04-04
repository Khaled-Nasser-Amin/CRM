<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use App\Notifications\NewEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class FullCalenderController extends Controller
{
    public function index(Request $request)
    {

        if($request->ajax())
        {
            $data = Event::
                get(['id', 'title', 'start', 'end']);
            return response()->json($data);
        }
        return view('admin.fullCalendar');
    }

    public function action(Request $request)
    {
        if($request->ajax())
        {
            if($request->type == 'add')
            {
                $event = Event::create([
                    'title'		=>	$request->title,
                    'start'		=>	$request->start,
                    'end'		=>	$request->end
                ]);

                $this->sendNotification($event);
                return response()->json($event);
            }

            if($request->type == 'update')
            {
                $event = Event::find($request->id)->update([
                    'title'		=>	$request->title,
                    'start'		=>	$request->start,
                    'end'		=>	$request->end
                ]);

                return response()->json($event);
            }

            if($request->type == 'delete')
            {
                $event = Event::find($request->id)->delete();

                return response()->json($event);
            }
        }
    }

    public function sendNotification($event){
        $users=User::where('id','!=',auth()->user()->id)->get();
        Notification::send($users,new NewEvent($event,auth()->user()));

    }
}
