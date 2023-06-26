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
        Schema::create('vacations', function (Blueprint $table) {
            $table->id();
            $table->string('employee_name');
            $table->foreignId('employee_id')->references('id')->on('users');
            $table->integer('national_number');
            $table->integer('Job_number');
            $table->string('specialization');
            $table->string('description');
            $table->string('reason');
            $table->string('image');
            $table->date('start_day');
            $table->date('end_day');
            $table->enum('status', ['acceptable', 'waiting ', 'canceled', 'rejected'])->default('waiting');
            $table->enum('type', ['Paid', 'Deducted ', 'Sick', 'Without_Salary_Deduction']);

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
        Schema::dropIfExists('vacations');
    }
};
