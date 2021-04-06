<?php

namespace App\Notifications;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class DeleteLead extends Notification
{
    use Queueable;
    public $lead;
    public $user;
    public $projectName;

    public function __construct($lead,$user,$projectName)
    {
        $this->lead=$lead;
        $this->user=$user;
        $this->projectName=$projectName;
    }

    public function via($notifiable)
    {
        return [CustomDBNotifications::class,'broadcast'];
    }


    public function toDatabase($notifiable)
    {
        return [
            'event' => $this->lead,
            'user_id' => $this->user->id,
            'notification_text' => "Deleted Lead Called: ".$this->lead .($this->user->id == 1 ? ' from your leads' : ''),
            'details' => $this->projectName?'This lead exists in ' . $this->projectName :'',

        ];

    }
    public function toBroadcast($notifiable)
    {
        return (new BroadcastMessage([
            'userImage' =>$this->user->image,
            'userId' =>$this->user->id,
            'userName' =>$this->user->name,
            'notification_text' => "Deleted Lead Called: ".$this->lead .($this->user->id == 1 ? ' from your leads' : ''),
            'created_at' => Carbon::now()->diffForHumans(),
            'details' => $this->projectName?'This lead exists in ' . $this->projectName :'',

        ]));
    }


    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
