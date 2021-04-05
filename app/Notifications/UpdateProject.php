<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UpdateProject extends Notification
{
    use Queueable;
    public $project;
    public $user;
    public $developerName;

    public function __construct($project,$user,$developerName)
    {
        $this->project=$project;
        $this->user=$user;
        $this->developerName=$developerName;
    }

    public function via($notifiable)
    {
        return [CustomDBNotifications::class,'broadcast'];
    }


    public function toDatabase($notifiable)
    {
        return [
            'event' => $this->project,
            'user_id' => $this->user->id,
            'notification_text' => "Updated Project : ".$this->project->name,
            'details' => $this->developerName?'This project exists in' . $this->developerName :'',

        ];

    }
    public function toBroadcast($notifiable)
    {
        return (new BroadcastMessage([
            'userImage' =>$this->user->image,
            'userId' =>$this->user->id,
            'userName' =>$this->user->name,
            'notification_text' => "Updated Project : ".$this->project->name,
            'created_at' => $this->project->updated_at->diffForHumans(),
            'details' => $this->developerName?'This project exists in ' . $this->developerName :'',

        ]));
    }


    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
