<?php

function messagesForAuthenticatedUser($user_id){
    return auth()->user()->messages->where('receiver_id',$user_id)->merge(auth()->user()->messages->where('sender_id',$user_id))->sortBy('created_at');

}
