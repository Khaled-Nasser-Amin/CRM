<?php

namespace App\Models;

use App\Traits\TwoFactorAuthenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable,TwoFactorAuthenticatable;

    protected $guarded=['role'];
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'serial',
        'image',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function leads(){
        return $this->hasMany(Lead::class);
    }
    public function tickets(){
        return $this->hasMany(Ticket::class);
    }
    public function properties(){
        return $this->hasMany(Properties::class);
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }
    public function projects(){
        return $this->hasManyThrough(Project::class,Lead::class,'user_id','id','id','project_id');
    }

    public function messagesAsSender(){
        return $this->hasMany(Message::class,'sender_id');
    }
    public function messagesAsReceiver(){
        return $this->hasMany(Message::class,'receiver_id');
    }

    public function messages()
    {
        return $this->messagesAsSender()->union($this->messagesAsReceiver()->toBase());
    }

    public function getImageAttribute($value){
        return $value? asset('images/users/'.$value):$value;
    }

    public function receivesBroadcastNotificationsOn()
    {
        return 'user.'.$this->id;
    }

    public function myNotifications(){
        return $this->hasMany(DatabaseNotification::class);
    }



}
