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
        $users=User::where('id','!=',auth()->user()->id)->get();
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
        $dateForHuman=$message->created_at->diffForHumans();
        $message=collect($message);
        $message->put('dateForHumans',$dateForHuman);
        broadcast(new ChatEvent($receiver_id,$message))->toOthers();
        $this->readMessages($receiver_id);
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
        $dateForHuman=$message->created_at->diffForHumans();
        $message=collect($message);
        $message->put('dateForHumans',$dateForHuman);
        $message->put('name',$file->getClientOriginalName());
        broadcast(new ChatEvent($receiver_id,$message))->toOthers();
        $this->readMessages($receiver_id);
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

    public function readMessages($sender_id){
        Message::where('sender_id',$sender_id)->where('receiver_id',auth()->user()->id)->update([
            'state' => 1
        ]);
    }
    public function getUnReadMessages($sender_id)
    {
        $numberOfUnReadMessage = Message::where('sender_id', $sender_id)->where('receiver_id', auth()->user()->id)
            ->where('state',0)->count();
        return $numberOfUnReadMessage;
    }
}
