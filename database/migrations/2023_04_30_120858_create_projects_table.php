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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('customer_id')->references('id')->on('customers');
            $table->foreignId('product_id')->references('id')->on('products');
            $table->string('description');
            $table->string('image');
            $table->foreignId('grope_id')->references('id')->on('groups');
            $table->foreignId('admin')->references('id')->on('users');
            $table->integer('price');
            $table->string('total_price');
            $table->foreignId('user_id')->references('id')->on('users');
            $table->date('began_date');
            $table->date('end_date');
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
        Schema::dropIfExists('projects');
    }
};
