<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCableListElementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cable_list_elements', function (Blueprint $table) {
            $table->id();
            $table->string('Device');
            $table->string('DeviceNumber');
            $table->integer('Position');

            $table->unsignedBigInteger('CableListId');
            $table->foreign('CableListId')->references('id')->on('cablelists');
            
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
        Schema::dropIfExists('cable_list_elements');
    }
}
