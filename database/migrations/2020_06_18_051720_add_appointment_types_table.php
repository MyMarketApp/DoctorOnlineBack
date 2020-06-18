<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Http\Models\AppointmentTypes;

class AddAppointmentTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $status = new AppointmentTypes();
        $status->name = "Chat";
        $status->save();

        $status = new AppointmentTypes();
        $status->name = "Llamada";
        $status->save();

        $status = new AppointmentTypes();
        $status->name = "Videollamada";
        $status->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
