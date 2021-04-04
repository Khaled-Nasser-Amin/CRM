<?php

namespace App\Notifications;


use Illuminate\Notifications\Notification;

class CustomDBNotifications
{
    public function send($notifiable, Notification $notification)
    {
        $data = $notification->toDatabase($notifiable);


// lets create a DB row now with our custom field message text

        return $notifiable->routeNotificationFor('database')->create([

            'id' => $notification->id,
            'user_id'=> $data['user_id'],
            'type' => get_class($notification),
            'data' => $data['event'],
            'notification_text' => $data['notification_text'],
            'read_at' => null,
        ]);
    }

}
