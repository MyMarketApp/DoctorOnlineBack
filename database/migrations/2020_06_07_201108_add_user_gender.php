<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Http\Models\UserGender;

class AddUserGender extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        $gender = new UserGender();
        $gender->name = "Masculino";
        $gender->save();

        $gender = new UserGender();
        $gender->name = "Femenino";
        $gender->save();
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
