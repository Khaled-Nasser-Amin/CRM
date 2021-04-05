<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UpdateDeveloper extends Notification
{    use Queueable;
    public $developer;
    public $user;

    public function __construct($developer,$user)
    {
        $this->developer=$developer;
        $this->user=$user;
    }

    public function via($notifiable)
    {
        return [CustomDBNotifications::class,'broadcast'];
    }


    public function toDatabase($notifiable)
    {
        return [
            'event' => $this->developer,
            'user_id' => $this->user->id,
            'notification_text' => "Updated Developer : ".$this->developer->name,
            'details' => '' ,

        ];

    }
    public function toBroadcast($notifiable)
    {
        return (new BroadcastMessage([
            'userImage' =>$this->user->image,
            'userId' =>$this->user->id,
            'userName' =>$this->user->name,
            'notification_text' => "Updated Developer : ".$this->developer->name,
            'created_at' => $this->developer->updated_at->diffForHumans(),
            'details' => '' ,

        ]));
    }


    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
