<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkrecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workrecords', function (Blueprint $table) {
            $table->id();
            $table->string('title', 50);
            
            $table->unsignedBigInteger('ProjectId');
            $table->foreign('ProjectId')->references('id')->on('projects');

            $table->unsignedBigInteger('UserId');
            $table->foreign('UserId')->references('id')->on('users');

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
        Schema::dropIfExists('workrecords');
    }
}
