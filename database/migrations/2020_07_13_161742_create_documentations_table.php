<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentations', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('ProjectId');
            $table->foreign('ProjectId')->references('id')->on('projects');

            $table->unsignedBigInteger('EmployeeId');
            $table->foreign('EmployeeId')->references('id')->on('users');

            $table->unsignedBigInteger('MeasurmentId');
            $table->foreign('MeasurmentId')->references('id')->on('measurments');

            $table->unsignedBigInteger('SpecificationId');
            $table->foreign('SpecificationId')->references('id')->on('specifications');

            $table->unsignedBigInteger('CategoryId');
            $table->foreign('CategoryId')->references('id')->on('docu_categories');

            $table->unsignedBigInteger('ObjectId');
            $table->foreign('ObjectId')->references('id')->on('docu_objects');

            $table->unsignedBigInteger('FloorId');
            $table->foreign('FloorId')->references('id')->on('docu_floors');

            $table->unsignedBigInteger('RoomId');
            $table->foreign('RoomId')->references('id')->on('docu_rooms');

            $table->float('amount', 8, 2);

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
        Schema::dropIfExists('documentations');
    }
}
