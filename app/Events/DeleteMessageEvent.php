<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class DeleteMessageEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $sender;
    public $receiver_id;
    public $message_id;
    public function __construct($sender,$receiver_id,$message_id)
    {
        $this->sender=$sender;
        $this->receiver_id=$receiver_id;
        $this->message_id=$message_id;
    }


    public function broadcastOn()
    {
        return new Channel('Chat.'.$this->receiver_id);
    }
}
