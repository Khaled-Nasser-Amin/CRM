<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ChatEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;
    public $sender;
    public $lastMessage;
    public $receiver_id;
    public function __construct($sender,$message,$lastMessage,$receiver_id)
    {
        $this->message=$message;
        $this->sender=$sender;
        $this->lastMessage=$lastMessage;
        $this->receiver_id=$receiver_id;
    }


    public function broadcastOn()
    {
        return new Channel('Chat.'.$this->receiver_id);
    }
}
