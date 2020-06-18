<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointment', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('diagnostic')->nullable();
            $table->string('prescription')->nullable();
            $table->string('comment')->nullable();
            $table->float('score')->nullable();
            $table->date('date')->nullable();
            $table->integer('idDoctor')->unsigned();
            $table->integer('idStatus')->unsigned();
            $table->integer('idPatient')->unsigned();
            $table->integer('idSchedule')->unsigned();
            $table->integer('idType')->unsigned();

            $table->timestamps();

            $table->foreign('idDoctor')->references('id')->on('doctor')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('idStatus')->references('id')->on('appointment_status')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('idPatient')->references('id')->on('patient')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('idSchedule')->references('id')->on('schedule')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('idType')->references('id')->on('appointment_types')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointment');
    }
}
