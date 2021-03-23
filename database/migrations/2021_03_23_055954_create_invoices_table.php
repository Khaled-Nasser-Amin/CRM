<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{

    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('customerName');
            $table->integer('invoiceSerial');
            $table->date('start');
            $table->date('end');
            $table->string('employeeEmail');
            $table->string('paymentMethodology');
            $table->string('notes');
            $table->string('propertyName');
            $table->string('description');
            $table->integer('cost');
            $table->integer('quantity');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}
