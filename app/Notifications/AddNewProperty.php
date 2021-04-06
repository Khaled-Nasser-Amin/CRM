<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AddNewProperty extends Notification
{
    use Queueable;
    public $property;
    public $user;
    public $projectName;

    public function __construct($property,$user,$projectName)
    {
        $this->property=$property;
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
            'event' => $this->property,
            'user_id' => $this->user->id,
            'notification_text' => "Added New Property : ".$this->property->name,
            'details' => $this->projectName?'This Property exists in ' . $this->projectName. ' project' :'',

        ];

    }
    public function toBroadcast($notifiable)
    {
        return (new BroadcastMessage([
            'userImage' =>$this->user->image,
            'userId' =>$this->user->id,
            'userName' =>$this->user->name,
            'notification_text' => "Added New Property : ".$this->property->name,
            'created_at' => $this->property->created_at->diffForHumans(),
            'details' => $this->projectName?'This Property exists in ' . $this->projectName. ' project' :'',

        ]));
    }


    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
