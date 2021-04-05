<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AddNewUser extends Notification
{
    use Queueable;
    public $employee;
    public $user;

    public function __construct($employee,$user)
    {
        $this->employee=$employee;
        $this->user=$user;
    }

    public function via($notifiable)
    {
        return [CustomDBNotifications::class,'broadcast'];
    }


    public function toDatabase($notifiable)
    {
        return [
            'event' => $this->employee,
            'user_id' => $this->user->id,
            'notification_text' => "Added New User called : ".$this->employee->name,
            'details' =>'',

        ];

    }
    public function toBroadcast($notifiable)
    {
        return (new BroadcastMessage([
            'userImage' =>$this->user->image,
            'userId' =>$this->user->id,
            'userName' =>$this->user->name,
            'notification_text' => "Added New User Called : ".$this->employee->name,
            'created_at' => $this->employee->created_at->diffForHumans(),
            'details' =>'',

        ]));
    }


    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
