<?php

namespace App\Notifications;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class DeleteDeveloper extends Notification
{    use Queueable;
    public $devel;
    public $user;

    public function __construct($devel,$user)
    {
        $this->devel=$devel;
        $this->user=$user;
    }

    public function via($notifiable)
    {
        return [CustomDBNotifications::class,'broadcast'];
    }


    public function toDatabase($notifiable)
    {
        return [
            'event' => $this->devel,
            'user_id' => $this->user->id,
            'notification_text' => "Deleted Developer : ".$this->devel['name'],
            'details' => '' ,

        ];

    }
    public function toBroadcast($notifiable)
    {
        return (new BroadcastMessage([
            'userImage' =>$this->user->image,
            'userId' =>$this->user->id,
            'userName' =>$this->user->name,
            'notification_text' => "Deleted Developer : ".$this->devel['name'],
            'created_at' =>  Carbon::now()->diffForHumans(),
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
