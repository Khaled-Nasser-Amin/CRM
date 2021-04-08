<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable=[
        'invoiceSerial','start','end','paymentMethodology','cost','quantity','total','description','notes','propertyName'
    ];
    protected $guarded=[];

    public function lead(){
        return $this->belongsTo(Lead::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function property(){
        return $this->belongsTo(Properties::class);
    }

}
