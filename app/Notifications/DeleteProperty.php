<?php

namespace App\Notifications;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class DeleteProperty extends Notification
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
            'notification_text' => "Deleted property : ".$this->property['name'],
            'details' => $this->projectName?'This property exists in ' . $this->projectName. ' project' :'',

        ];

    }
    public function toBroadcast($notifiable)
    {
        return (new BroadcastMessage([
            'userImage' =>$this->user->image,
            'userId' =>$this->user->id,
            'userName' =>$this->user->name,
            'notification_text' => "Deleted Property : ".$this->property['name'],
            'created_at' => Carbon::now()->diffForHumans(),
            'details' => $this->projectName?'This property exists in ' . $this->projectName. ' project' :'',

        ]));
    }


    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
