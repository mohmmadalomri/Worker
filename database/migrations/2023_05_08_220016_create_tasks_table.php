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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->references('id')->on('users');
            $table->foreignId('project_id')->references('id')->on('projects');
            $table->string('title');
            $table->string('image');
            $table->string('description');
            $table->foreignId('customer_id')->references('id')->on('customers');
            $table->date('end_date');
            $table->date('start_date');
            $table->foreignId('group_id')->references('id')->on('groups');



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
        Schema::dropIfExists('tasks');
    }
};
