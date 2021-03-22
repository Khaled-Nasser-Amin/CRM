<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $fillable=['name'];

    public function property(){
        return $this->belongsTo(Properties::class,'property_id');
    }
}
