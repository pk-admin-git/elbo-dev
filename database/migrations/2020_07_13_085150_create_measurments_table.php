<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeasurmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('measurments', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('ProjectId');
            $table->foreign('ProjectId')->references('id')->on('projects');

            $table->smallInteger('Number');
            $table->boolean('Closed');
            $table->boolean('Current');
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
        Schema::dropIfExists('measurments');
    }
}
