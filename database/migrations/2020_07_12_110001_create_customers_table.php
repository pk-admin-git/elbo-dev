<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('Name', 30);
            $table->string('SubName', 50);
            $table->string('SubSubName', 50);
            $table->string('AdressStreet', 50);
            $table->integer('AdressNumber');
            $table->integer('AdressPLZ');
            $table->string('AdressCity', 50);
            $table->string('AdressCountry', 50);
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
        Schema::dropIfExists('customers');
    }
}
