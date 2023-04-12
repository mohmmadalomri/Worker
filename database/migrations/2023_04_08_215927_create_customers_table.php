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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->references('id')->on('users');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('company_name');
            $table->integer('phone');
            $table->string('email');
            $table->string('website');
            $table->string('facebook_link');
            $table->string('tweeter_link');
            $table->string('youtube_link');
            $table->string('linkedin_link');
            $table->string('instgram_link');
            $table->string('address_1');
            $table->string('address_2');
            $table->string('town');
            $table->string('interrupt');
            $table->string('zipcode');
            $table->string('country');
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
        Schema::dropIfExists('customers');
    }
};
