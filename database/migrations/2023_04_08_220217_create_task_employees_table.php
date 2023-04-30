<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_employees', function (Blueprint $table) {

            $table->id();
            $table->uuid('task_number');
            $table->foreignId('user_id')->references('id')->on('users');
            $table->string('employee_name');
            $table->integer('national_number')->nullable();
            $table->integer('Job_number');
            $table->string('name');
            $table->string('description');
            $table->string('image');
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
        Schema::dropIfExists('task_employees');
    }
};
