<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_project', function (Blueprint $table) {
            
            $table->unsignedBigInteger('EmployeeId');
            $table->foreign('EmployeeId')->references('id')->on('users');

            $table->unsignedBigInteger('ProjectId');
            $table->foreign('ProjectId')->references('id')->on('projects');

            $table->timestamps();

            $table->primary('EmployeeId','ProjectId');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_project');
    }
}
