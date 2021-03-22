<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Properties extends Model
{
    use HasFactory;
    protected $guarded=[];


    public function user(){
        return $this->belongsTo(User::class);
    }
    public function amenities(){
        return $this->belongsToMany(Amenity::class,'propertyamenities','property_id','amenity_id');
    }
    public function project(){
        return $this->belongsTo(Project::class);
    }
    public function images(){
        return $this->hasMany(Image::class,'property_id');
    }

}
