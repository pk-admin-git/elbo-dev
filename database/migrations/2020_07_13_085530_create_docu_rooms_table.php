<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocuRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docu_rooms', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('ProjectId');
            $table->foreign('ProjectId')->references('id')->on('projects');

            $table->string('Room', 50);
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
        Schema::dropIfExists('docu_rooms');
    }
}
