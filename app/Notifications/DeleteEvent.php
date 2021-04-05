<?php

namespace App\Notifications;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class DeleteEvent extends Notification
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
            'notification_text' => "Event Deleted : ".$this->event->title,
            'details' => '',

        ];

    }
    public function toBroadcast($notifiable)
    {
        return (new BroadcastMessage([
            'userImage' =>$this->user->image,
            'userId' =>$this->user->id,
            'userName' =>$this->user->name,
            'notification_text' => "Event Deleted : ".$this->event->title,
            'created_at' => Carbon::now()->diffForHumans(),
            'details' => '',

        ]));
    }


    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
