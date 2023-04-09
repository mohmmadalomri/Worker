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
        Schema::create('salaries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->references('id')->on('users');
            $table->date('date');
            $table->integer('Job_number');
            $table->string('employee_name');
            $table->integer('national_number');
            $table->bigInteger('section_id');
            $table->bigInteger('deductions');
            $table->bigInteger('discounts');
            $table->bigInteger('tax');
            $table->bigInteger('social_security');
            $table->bigInteger('net_salary');

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
        Schema::dropIfExists('salaries');
    }
};
