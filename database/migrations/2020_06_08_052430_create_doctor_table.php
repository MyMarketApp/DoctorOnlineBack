<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('description')->nullable();
            $table->string('name')->nullable();
            $table->string('lastName')->nullable();
            $table->string('dni')->unique();
            $table->float('rate');
            $table->integer('idGender')->unsigned();
            $table->integer('idUser')->unsigned();
            $table->integer('idSpecialty')->unsigned();
            $table->date('birthdate')->nullable();
            $table->string('imageUrl')->nullable();
            $table->string('idStripePrice');
            $table->timestamps();

            $table->foreign('idUser')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('idGender')->references('id')->on('user_gender')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('idSpecialty')->references('id')->on('specialties')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctor');
    }
}
