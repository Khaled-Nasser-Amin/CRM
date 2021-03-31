<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guarded=['role'];
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'serial',
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

}
