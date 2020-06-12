<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Http\Models\AppointmentStatus;

class AddAppointmentStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        $status = new AppointmentStatus();
        $status->name = "Pendiente de Pago";
        $status->save();

        $status = new AppointmentStatus();
        $status->name = "Pagado";
        $status->save();

        $status = new AppointmentStatus();
        $status->name = "Cancelado";
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
