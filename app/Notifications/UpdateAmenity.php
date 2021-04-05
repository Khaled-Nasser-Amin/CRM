<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UpdateAmenity extends Notification
{
    use Queueable;
    public $amenity;
    public $user;

    public function __construct($amenity,$user)
    {
        $this->amenity=$amenity;
        $this->user=$user;
    }

    public function via($notifiable)
    {
        return [CustomDBNotifications::class,'broadcast'];
    }


    public function toDatabase($notifiable)
    {
        return [
            'event' => $this->amenity,
            'user_id' => $this->user->id,
            'notification_text' => "Updated Amenity : ".$this->amenity->name,
            'details' => '' ,

        ];

    }
    public function toBroadcast($notifiable)
    {
        return (new BroadcastMessage([
            'userImage' =>$this->user->image,
            'userId' =>$this->user->id,
            'userName' =>$this->user->name,
            'notification_text' => "Updated Amenity : ".$this->amenity->name,
            'created_at' => $this->amenity->updated_at->diffForHumans(),
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
