<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProjectAmenities extends Migration
{

    public function up()
    {
        Schema::create('ProjectAmenities',function (Blueprint $table){
            $table->id();
            $table->bigInteger('project_id')->nullable()->unsigned();
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->bigInteger('amenity_id')->nullable()->unsigned();
            $table->foreign('amenity_id')->references('id')->on('amenities')->onDelete('cascade');

        });
    }


    public function down()
    {
        Schema::dropIfExists('ProjectAmenities');
    }
}
