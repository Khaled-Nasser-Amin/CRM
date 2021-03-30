<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'firstPhone',
        'user_id',
        'developer_id',
        'project_id',
        'secondPhone',
        'address',
        'city',
        'country',
        'comment',
        'bestTime',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function project(){
        return $this->belongsTo(Project::class);
    }
    public function developer(){
        return $this->belongsTo(Developer::class);
    }
    public function Updates(){
        return $this->hasMany(LastUpdateForLead::class);
    }

    public function invoices(){
        return $this->hasMany(Invoice::class);
    }
}
