<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PropertyAmenities extends Migration
{
    public function up()
    {
        Schema::create('PropertyAmenities',function (Blueprint $table){
            $table->id();
            $table->bigInteger('property_id')->unsigned()->nullable();
            $table->foreign('property_id')->references('id')->on('properties')->onDelete('cascade');
            $table->bigInteger('amenity_id')->unsigned()->nullable();
            $table->foreign('amenity_id')->references('id')->on('amenities')->onDelete('cascade');
        });
    }


    public function down()
    {
        Schema::dropIfExists('PropertyAmenities');
    }
}
