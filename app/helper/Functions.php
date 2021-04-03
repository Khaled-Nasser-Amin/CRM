<?php

use App\Models\User;

function messagesForAuthenticatedUser($user_id){
    return auth()->user()->messages->where('receiver_id',$user_id)->merge(auth()->user()->messages->where('sender_id',$user_id))->sortBy('created_at');

}

function UsersWhichHasMessagesWithAuthenticatedUser(){
   $users= User::where('id','!=',auth()->user()->id)->whereHas('messagesAsReceiver',function ($q){
           return $q->where('sender_id',auth()->user()->id)->orderBy('messages.created_at');
       })->orWhereHas('messagesAsSender',function ($q){
           return $q->where('receiver_id',auth()->user()->id)->orderBy('messages.created_at');
       })->get();

   foreach ($users as $user){
       $data[]=[
           'id' => $user->id,
           'image' => $user->image,
           'name' => $user->name,
           'lastMessage' => messagesForAuthenticatedUser($user->id)->last()->text,
           'messageCreatedAt' => messagesForAuthenticatedUser($user->id)->last()->created_at,
       ];
   }
   return collect($data)->sortByDesc('messageCreatedAt');
};
