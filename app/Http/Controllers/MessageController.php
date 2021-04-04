<?php

namespace App\Http\Controllers;

use App\Events\ChatEvent;
use App\Http\Traits\ImageTrait;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;

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
        $message=$this->DRYS($message,$request);
        return $message;
    }
    public function storeFile(Request $request){
        $file=$request->file('fileName');
        $fileName=time().'_'.$file->getClientOriginalName();
        $extension=$file->getClientOriginalExtension();
        $type='file';
        if(in_array($extension,['png','jpg','jpeg','gif'])){
            $type='image';
        }
        $file->move(public_path('chat_files'),$fileName);
        $message=Message::create([
            'text'=> $fileName,
            'type'=>$type,
        ]);
        $message=$this->DRYS($message,$request,$file->getClientOriginalName());


       return $message;
    }

    private function DRYS($message,$request,$fileName=null){
        $receiver_id=$request->receiver_id;
        $message->sender()->associate(auth()->user()->id)->save();
        $message->receiver()->associate($receiver_id)->save();
        $dateForHuman=$message->created_at->diffForHumans();
        $message=collect($message);
        $message->put('dateForHumans',$dateForHuman);
        $sender=User::find(auth()->user()->id);
        dispatch(function () use($sender,$message,$receiver_id){
            broadcast(new ChatEvent($sender,$message,$this->lastMessageBetweenTwoUsers($receiver_id),$receiver_id))->toOthers();
        })->afterResponse();
        $this->readMessages($receiver_id);
        $user=User::find($receiver_id);
        $message->put('receiverName',$user->name);
        $message->put('receiverImage',$user->image);
        $message->put('senderImage',$sender->image);
        $message->put('lastMessage',$this->lastMessageBetweenTwoUsers($receiver_id));
        $message['type'] != 'text' ?$message->put('name',$fileName):null;

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
    public function getAllUnreadMessages()
    {
        $numberOfUnReadMessage =auth()->user()->messagesAsReceiver->where('state',0)->count();
        return $numberOfUnReadMessage;
    }

    public function lastMessageBetweenTwoUsers($sender_id){
        if(messagesForAuthenticatedUser($sender_id)->last()->type == 'text'){
            return messagesForAuthenticatedUser($sender_id)->last()->text;
        }else{
            $arrayOfText= explode('_',messagesForAuthenticatedUser($sender_id)->last()->text);
            return end($arrayOfText);
        }
    }
}
