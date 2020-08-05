<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocuCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docu_categories', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('ProjectId');
            $table->foreign('ProjectId')->references('id')->on('projects');

            $table->unsignedBigInteger('DocuObjectId');
            $table->foreign('DocuObjectId')->references('id')->on('docu_objects');

            $table->unsignedBigInteger('DocuFloorId');
            $table->foreign('DocuFloorId')->references('id')->on('docu_floors');

            $table->string('Category', 50);
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
        Schema::dropIfExists('docu_categories');
    }
}
