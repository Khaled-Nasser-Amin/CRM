<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amenity extends Model
{
    use HasFactory;
    protected $fillable=['name'];

    public function properties(){
        return $this->belongsToMany(Properties::class,'propertyamenities','amenity_id','property_id');
    }
    public function projects(){
        return $this->belongsToMany(Project::class,'projectamenities');
    }
}
