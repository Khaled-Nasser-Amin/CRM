<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadsTable extends Migration
{

    public function up()
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->bigInteger('user_id')->nullable()->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->bigInteger('developer_id')->nullable()->unsigned();
            $table->foreign('developer_id')->references('id')->on('developers')->onDelete('cascade');

            $table->bigInteger('project_id')->nullable()->unsigned();
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');

            $table->string('firstPhone');
            $table->string('secondPhone')->nullable();
            $table->string('address');
            $table->string('city');
            $table->string('state')->nullable();
            $table->date('stageDate')->nullable();
            $table->time('time')->nullable();
            $table->string('country');
            $table->string('comment');
            $table->string('bestTime');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('leads');
    }
}
