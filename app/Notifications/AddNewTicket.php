<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AddNewTicket extends Notification
{
    use Queueable;
    public $ticket;
    public $user;

    public function __construct($ticket,$user)
    {
        $this->ticket=$ticket;
        $this->user=$user;
    }

    public function via($notifiable)
    {
        return [CustomDBNotifications::class,'broadcast'];
    }


    public function toDatabase($notifiable)
    {

        return [
            'event' => $this->ticket,
            'user_id' => $this->user->id,
            'notification_text' => "New ticket from: " . $this->user->name ,
            'details' => $this->ticket->comment,

        ];

    }
    public function toBroadcast($notifiable)
    {
        return (new BroadcastMessage([
            'userImage' =>$this->user->image,
            'userId' =>$this->user->id,
            'userName' =>$this->user->name,
            'notification_text' => "New ticket from: " . $this->user->name ,
            'created_at' => $this->ticket->created_at->diffForHumans(),
            'details' => $this->ticket->comment,
            'ticketName' => $this->ticket->name,

        ]));
    }


    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
