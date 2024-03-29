<?php

namespace App\Http\Controllers;

use App\Events\ChatEvent;
use App\Events\ClearChatEvent;
use App\Events\DeleteMessageEvent;
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
        if($message->sender_id == auth()->user()->id  || $message->receiver_id ==  auth()->user()->id){
            $headers = array(
                'Content-Type: application/pdf',
            );
            $array=explode('.',$message->text);
            $extension=end($array);
            $array=explode('_',$message->text);
            $name=end($array);
            return response()->download(public_path('chat_files').'/'.$message->text, $name , $headers);
        }else{
            return abort(404);
        }

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
        if(lastMessage($sender_id)->type == 'text'){
            return lastMessage($sender_id)->text;
        }else{
            $arrayOfText= explode('_',lastMessage($sender_id)->text);
            return end($arrayOfText);
        }
    }


    //clear chat
    public function deleteMessages($id){

        $files=auth()->user()->messagesAsSender()->where('receiver_id',$id)->where('type','file')->orWhere('type','image')->get();
        if($files){
            foreach ($files as $file)
                unlink(public_path('chat_files').'\\'.$file->text);
        }
        dispatch(function () use($id){
            broadcast(new ClearChatEvent(auth()->user(),$id))->toOthers();
        })->afterResponse();
        auth()->user()->messagesAsSender()->where('receiver_id',$id)->delete();
        return redirect()->back()->with(['success' => 'deleted successfully']);

    }

    //delete specific message
    public function deleteMessage(Message $message){
        if($message->sender_id == auth()->user()->id ) {
            $receiverId=$message->receiver_id;
            $messageId=$message->id;
            dispatch(function () use($message,$receiverId,$messageId){
                broadcast(new DeleteMessageEvent(auth()->user(),$receiverId,$messageId))->toOthers();
            })->afterResponse();
            $message->delete();
            return $receiverId;

        }else{
            return abort(404);
        }

    }

}
