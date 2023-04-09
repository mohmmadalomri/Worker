<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->references('id')->on('users');
            $table->foreignId('customer_id')->references('id')->on('customers');
            $table->string('title');
            $table->date('date');
            $table->integer('remaining_amount');
            $table->foreignId('order_id')->references('id')->on('orders');
            $table->integer('value');
            $table->double('discount');
            $table->double('tax');
            $table->double('total');
            $table->string('massage');

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
        Schema::dropIfExists('invoices');
    }
};