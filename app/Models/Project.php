<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function leads(){
        return $this->hasMany(Lead::class);
    }
    public function properties(){
        return $this->hasMany(Properties::class);
    }
    public function amenities(){
        return $this->belongsToMany(Amenity::class,'projectamenities');
    }

    public function developer(){
        return $this->belongsTo(Developer::class);
    }
}
