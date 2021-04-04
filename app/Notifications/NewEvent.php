<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewEvent extends Notification implements ShouldQueue
{
    use Queueable;
    public $event;
    public $user;

    public function __construct($event,$user)
    {
        $this->event=$event;
        $this->user=$user;
    }

    public function via($notifiable)
    {
        return [CustomDBNotifications::class,'broadcast'];
    }


    public function toDatabase($notifiable)
    {
        return [
            'event' => $this->event,
            'user_id' => $this->user->id,
            'notification_text' => "Added New Event :: ".$this->event->title,
        ];

    }
    public function toBroadcast($notifiable)
    {
        return (new BroadcastMessage([
            'data' => $this->event,
            'read_at' => null,
            'user' =>$this->user
        ]));
    }


    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
