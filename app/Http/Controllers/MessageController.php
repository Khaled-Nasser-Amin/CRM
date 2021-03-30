<?php

namespace App\Http\Controllers;

use App\Events\ChatEvent;
use App\Http\Traits\ImageTrait;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index(){
        $users=User::where('id','!=',auth()->user()->id)->with('messagesAsSender',function ($q){
            return $q->where('receiver_id',auth()->user()->id)
                ->orWhere('sender_id',auth()->user()->id)
                ->get();
        })->get();
        return view('admin.chat',compact('users'));
    }

    public function storeText(Request $request){
        $message=Message::create([
            'text' => $request->message,
            'type'=>'text'
        ]);
        $receiver_id=$request->receiver_id;
        $message->sender()->associate(auth()->user()->id)->save();
        $message->receiver()->associate($receiver_id)->save();
        broadcast(new ChatEvent($receiver_id,$message))->toOthers();
        $message['dateForHumans']=$message->created_at->diffForHumans();
       return $message;
    }
    public function storeFile(Request $request){
        $file=$request->file('fileName');
        $fileName=time().'_'.$file->getClientOriginalName();
        $extension=$file->getClientOriginalExtension();
        $type='file';
        $receiver_id=$request->receiver_id;
        if(in_array($extension,['png','jpg','jpeg','gif'])){
            $type='image';
        }
        $file->move(public_path('chat_files'),$fileName);
        $message=Message::create([
            'text'=> $fileName,
            'type'=>$type,
        ]);
        $message->sender()->associate(auth()->user()->id)->save();
        $message->receiver()->associate($receiver_id)->save();
        broadcast(new ChatEvent($receiver_id,$message))->toOthers();
        $message['dateForHumans']=$message->created_at->diffForHumans();
        $message['name']=$file->getClientOriginalName();;

        return $message;
    }

    public function downloadDocumentation(Message $message){


        $headers = array(
            'Content-Type: application/pdf',
        );
        $array=explode('.',$message->text);
        $extension=end($array);
        $array=explode('_',$message->text);
        $name=end($array);
        return response()->download(public_path('chat_files').'/'.$message->text, $name , $headers);

    }
}
