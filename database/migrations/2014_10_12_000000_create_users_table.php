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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('type', ['super_admin', 'admin', 'user'])->default('user');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('username')->nullable();
            $table->integer('phone')->nullable();
            $table->string('Company_Name')->nullable();
            $table->string('Company_Address')->nullable();
            $table->string('Company_Address_2')->nullable();
            $table->string('City')->nullable();
            $table->string('Postal_code')->nullable();
            $table->string('Country')->nullable();
            $table->string('Company_email')->nullable();
            $table->integer('national_number')->nullable();
            $table->integer('working_days')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->integer('Job_number')->nullable();
            $table->date('Date_of_employee_registration_in_system')->nullable();
            $table->date('Date_of_employee_registration_in_company')->nullable();
            $table->bigInteger('department_id')->nullable();
            $table->string('Beginning_work')->nullable();
            $table->string('finished_work')->nullable();
            $table->enum('status', ['official', 'hourly', 'part_time'])->nullable();
            $table->double('total_salary')->nullable();
            $table->double('partial_salary')->nullable();
            $table->double('bonuses')->nullable();
            $table->string('overtime')->nullable();
            $table->unsignedBigInteger('group_id')->nullable();///for empolyee
            $table->bigInteger('manger_id')->nullable(); ///for empolyee
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
