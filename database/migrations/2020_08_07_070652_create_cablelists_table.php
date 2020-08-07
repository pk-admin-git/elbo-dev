<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCablelistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cablelists', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name', 50);
            $table->unsignedBigInteger('ConnectionStart')->nullable();
            $table->unsignedBigInteger('ConnectionEnd')->nullable();

            $table->unsignedBigInteger('ProjectId');
            $table->foreign('ProjectId')->references('id')->on('projects');

            $table->unsignedBigInteger('CategoryId');
            $table->foreign('CategoryId')->references('id')->on('docu_categories');

            $table->unsignedBigInteger('ObjectId');
            $table->foreign('ObjectId')->references('id')->on('docu_objects');

            $table->unsignedBigInteger('FloorId');
            $table->foreign('FloorId')->references('id')->on('docu_floors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cablelists');
    }
}
