<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpecificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('specifications', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('ProjectID');
            $table->foreign('ProjectID')->references('id')->on('projects');
            
            $table->integer('Position');
            $table->string('ShortText', 50);
            $table->text('LongText');
            $table->integer('Quantity');
            $table->string('Unit', 10);
            $table->bigInteger('UnitPrice');
            $table->bigInteger('TotalPrice');
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
        Schema::dropIfExists('specifications');
    }
}
