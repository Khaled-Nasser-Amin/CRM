<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLastUpdateForLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('last_update_for_leads', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('lead_id')->nullable()->unsigned();
            $table->foreign('lead_id')->references('id')->on('leads')->onDelete('cascade');
            $table->string('stageDate');
            $table->string('time');
            $table->string('state');
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
        Schema::dropIfExists('last_update_for_leads');
    }
}
