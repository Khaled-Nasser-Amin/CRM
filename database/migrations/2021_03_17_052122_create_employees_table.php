<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->integer('serial');
            $table->integer('zip');
            $table->string('academicStudy');
<<<<<<< HEAD
            $table->string('area');
=======
            $table->string('aria');
>>>>>>> 10e784d6263dbdd9cf9d3e67f4c04701ce940e8f
            $table->string('address');
            $table->string('country');
            $table->string('city');
            $table->string('position');
            $table->string('experience');
<<<<<<< HEAD
            $table->string('documentation');
=======
>>>>>>> 10e784d6263dbdd9cf9d3e67f4c04701ce940e8f
            $table->string('email')->unique();
            $table->text('comment');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
