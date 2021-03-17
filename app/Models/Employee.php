<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $guarded=[];
<<<<<<< HEAD

    public function getDocumentationAttribute($value){
       return public_path('documentation').'/'.$value;
    }
=======
>>>>>>> 10e784d6263dbdd9cf9d3e67f4c04701ce940e8f
}
