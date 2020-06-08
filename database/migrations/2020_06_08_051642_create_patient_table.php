<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient', function (Blueprint $table) {
            $table->increments('id')->unsigned();;
            $table->string('name')->nullable();
            $table->string('lastName')->nullable();
            $table->integer('idGender')->unsigned();
            $table->integer('idUser')->unsigned();
            $table->string('dni')->unique();
            $table->date('birthdate')->nullable();
            $table->string('imageUrl')->nullable();
            $table->timestamps();

            $table->foreign('idUser')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('idGender')->references('id')->on('user_gender')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patient');
    }
}
