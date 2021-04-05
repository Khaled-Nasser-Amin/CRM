<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UpdateEvent extends Notification
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
            'notification_text' => "Event Updated: ".$this->event->title,
            'details' => $this->event->title.' starts at :'.$this->event->start ." and ends at :".$this->event->end,

        ];

    }
    public function toBroadcast($notifiable)
    {
        return (new BroadcastMessage([
            'userImage' =>$this->user->image,
            'userId' =>$this->user->id,
            'userName' =>$this->user->name,
            'notification_text' => "Event Updated: ".$this->event->title,
            'created_at' => $this->event->updated_at->diffForHumans(),
            'details' => $this->event->title.' starts at :'.$this->event->start ." and ends at :".$this->event->end,

        ]));
    }


    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
