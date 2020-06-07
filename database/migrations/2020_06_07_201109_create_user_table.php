<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id')->unsigned();;
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->string('lastName')->nullable();
            $table->string('phone')->nullable();
            $table->string('dni')->nullable();
            $table->date('birthdate')->nullable();
            $table->integer('idType')->unsigned();
            $table->integer('idGender')->unsigned();
            $table->timestamps();

            $table->foreign('idType')->references('id')->on('user_type')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('user');
    }
}
