<?php

use App\Models\User;
use App\Models\Message;
use Illuminate\Pagination\LengthAwarePaginator;

function messagesForAuthenticatedUser($user_id){
    $messages= Message::where([['receiver_id',auth()->user()->id],['sender_id',$user_id]])
            ->orWhere([['sender_id',auth()->user()->id],['receiver_id',$user_id]])
        ->orderByDesc('created_at')
        ->paginate(15);
    $messages=collect($messages)->merge(['user_id' => $user_id]);
    $url=parse_url($messages['path']);
    $options=[
        'path' => $messages['path'],
        'query' => [
            'page' => $messages['current_page'],
            'user' => $user_id
        ],
    ];
    $messages=new LengthAwarePaginator($messages,$messages['total'],$messages['per_page'],$messages['current_page'],$options);
    return $messages;

}
function lastMessage($user_id){
    return Message::where([['receiver_id',auth()->user()->id],['sender_id',$user_id]])
        ->orWhere([['sender_id',auth()->user()->id],['receiver_id',$user_id]])
        ->latest()->first();
}

function UsersWhichHasMessagesWithAuthenticatedUser(){
   $users= User::where('id','!=',auth()->user()->id)->whereHas('messagesAsReceiver',function ($q){
           return $q->where('sender_id',auth()->user()->id)->orderBy('messages.created_at');
       })->orWhereHas('messagesAsSender',function ($q){
           return $q->where('receiver_id',auth()->user()->id)->orderBy('messages.created_at');
       })->get();
    $data=[];
   foreach ($users as $user){
       $data[]=[
           'id' => $user->id,
           'image' => $user->image,
           'name' => $user->name,
           'lastMessage' => lastMessage($user->id)->text,
           'messageCreatedAt' => lastMessage($user->id)->created_at,
       ];
   }
   return collect($data)->sortByDesc('messageCreatedAt');
};
