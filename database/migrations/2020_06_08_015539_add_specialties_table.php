<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Http\Models\Specialty;

class AddSpecialtiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        $specialty = new Specialty();
        $specialty->name = "Psicología";
        $specialty->imageUrl = "https://clinicaortega.pe/webortega/wp-content/uploads/2017/08/PSICOLOGIA-01-418x315.png";
        $specialty->description = "Psicología https://clinicaortega.pe/webortega/wp-content/uploads/2017/08/PSICOLOGIA-01-418x315.png";
        $specialty->save();

        $specialty = new Specialty();
        $specialty->name = "Anestesiología";
        $specialty->imageUrl = "https://clinicaortega.pe/webortega/wp-content/uploads/2019/01/ANESTESIA-01-418x315.png";
        $specialty->description = "Anestesiología https://clinicaortega.pe/webortega/wp-content/uploads/2017/08/PSICOLOGIA-01-418x315.png";
        $specialty->save();

        $specialty = new Specialty();
        $specialty->name = "Cardiología";
        $specialty->imageUrl = "https://clinicaortega.pe/webortega/wp-content/uploads/2019/01/CARDIOLOGIA-01-418x315.png";
        $specialty->description = "Cardiología https://clinicaortega.pe/webortega/wp-content/uploads/2017/08/PSICOLOGIA-01-418x315.png";
        $specialty->save();

        $specialty = new Specialty();
        $specialty->name = "Cirugía General";
        $specialty->imageUrl = "https://clinicaortega.pe/webortega/wp-content/uploads/2019/01/CIRUGIA-GENERAL-01-418x315.png";
        $specialty->description = "Cirugía General https://clinicaortega.pe/webortega/wp-content/uploads/2017/08/PSICOLOGIA-01-418x315.png";
        $specialty->save();

        $specialty = new Specialty();
        $specialty->name = "Cirugia Plastica";
        $specialty->imageUrl = "https://clinicaortega.pe/webortega/wp-content/uploads/2019/01/CIRUGIA-PLASTICA-01-418x315.png";
        $specialty->description = "Cirugia Plastica https://clinicaortega.pe/webortega/wp-content/uploads/2017/08/PSICOLOGIA-01-418x315.png";
        $specialty->save();

        $specialty = new Specialty();
        $specialty->name = "Cirujano Dentista";
        $specialty->imageUrl = "https://clinicaortega.pe/webortega/wp-content/uploads/2019/01/DENTISTA-01-418x315.png";
        $specialty->description = "Cirujano Dentista https://clinicaortega.pe/webortega/wp-content/uploads/2017/08/PSICOLOGIA-01-418x315.png";
        $specialty->save();
        
        $specialty = new Specialty();
        $specialty->name = "Oncología";
        $specialty->imageUrl = "https://clinicaortega.pe/webortega/wp-content/uploads/2019/01/CANCER-01-418x315.png";
        $specialty->description = "Oncología https://clinicaortega.pe/webortega/wp-content/uploads/2017/08/PSICOLOGIA-01-418x315.png";
        $specialty->save();

        $specialty = new Specialty();
        $specialty->name = "Dermatología";
        $specialty->imageUrl = "https://clinicaortega.pe/webortega/wp-content/uploads/2019/01/DERMATOLOGIA-01-418x315.png";
        $specialty->description = "Dermatología https://clinicaortega.pe/webortega/wp-content/uploads/2017/08/PSICOLOGIA-01-418x315.png";
        $specialty->save();

        $specialty = new Specialty();
        $specialty->name = "Endocrinología";
        $specialty->imageUrl = "https://clinicaortega.pe/webortega/wp-content/uploads/2019/01/ENDOCRINOLOGIA-01-418x315.png";
        $specialty->description = "Endocrinología https://clinicaortega.pe/webortega/wp-content/uploads/2017/08/PSICOLOGIA-01-418x315.png";
        $specialty->save();

        $specialty = new Specialty();
        $specialty->name = "Gastroenterología";
        $specialty->imageUrl = "https://clinicaortega.pe/webortega/wp-content/uploads/2019/01/GASTROENTEROLOGO-01-418x315.png";
        $specialty->description = "Gastroenterología https://clinicaortega.pe/webortega/wp-content/uploads/2017/08/PSICOLOGIA-01-418x315.png";
        $specialty->save();

        $specialty = new Specialty();
        $specialty->name = "Ginecología y Obstetricia";
        $specialty->imageUrl = "https://clinicaortega.pe/webortega/wp-content/uploads/2019/01/OBSTETRICIA-01-2-418x315.png";
        $specialty->description = "Ginecología y Obstetricia https://clinicaortega.pe/webortega/wp-content/uploads/2017/08/PSICOLOGIA-01-418x315.png";
        $specialty->save();

        $specialty = new Specialty();
        $specialty->name = "Cirugía de Cabeza y Cuello";
        $specialty->imageUrl = "https://clinicaortega.pe/webortega/wp-content/uploads/2019/01/CABEZA-Y-CUELLO-01-418x315.png";
        $specialty->description = "Cirugía de Cabeza y Cuello https://clinicaortega.pe/webortega/wp-content/uploads/2017/08/PSICOLOGIA-01-418x315.png";
        $specialty->save();

        $specialty = new Specialty();
        $specialty->name = "Medicina Interna";
        $specialty->imageUrl = "https://clinicaortega.pe/webortega/wp-content/uploads/2019/01/MEDICINA-INTERNA-01-418x315.png";
        $specialty->description = "Medicina Interna https://clinicaortega.pe/webortega/wp-content/uploads/2017/08/PSICOLOGIA-01-418x315.png";
        $specialty->save();

        $specialty = new Specialty();
        $specialty->name = "Medicina Intensiva";
        $specialty->imageUrl = "https://clinicaortega.pe/webortega/wp-content/uploads/2019/01/UCI-01-1-418x315.png";
        $specialty->description = "Medicina Intensiva https://clinicaortega.pe/webortega/wp-content/uploads/2017/08/PSICOLOGIA-01-418x315.png";
        $specialty->save();

        $specialty = new Specialty();
        $specialty->name = "Medicina General";
        $specialty->imageUrl = "https://clinicaortega.pe/webortega/wp-content/uploads/2019/01/MEDICINA-GENERAL-01-418x315.png";
        $specialty->description = "Medicina General https://clinicaortega.pe/webortega/wp-content/uploads/2017/08/PSICOLOGIA-01-418x315.png";
        $specialty->save();

        $specialty = new Specialty();
        $specialty->name = "Neumología";
        $specialty->imageUrl = "https://clinicaortega.pe/webortega/wp-content/uploads/2017/11/NEUMOLOGIA-01-418x315.png";
        $specialty->description = "Neumología https://clinicaortega.pe/webortega/wp-content/uploads/2017/08/PSICOLOGIA-01-418x315.png";
        $specialty->save();

        $specialty = new Specialty();
        $specialty->name = "Oftalmología";
        $specialty->imageUrl = "https://clinicaortega.pe/webortega/wp-content/uploads/2017/10/OFTALMOLOGIA-01-1-418x315.png";
        $specialty->description = "Oftalmología https://clinicaortega.pe/webortega/wp-content/uploads/2017/08/PSICOLOGIA-01-418x315.png";
        $specialty->save();

        $specialty = new Specialty();
        $specialty->name = "Neurología";
        $specialty->imageUrl = "https://clinicaortega.pe/webortega/wp-content/uploads/2017/10/NEUROLOGIA-01-418x315.png";
        $specialty->description = "Neurología https://clinicaortega.pe/webortega/wp-content/uploads/2017/08/PSICOLOGIA-01-418x315.png";
        $specialty->save();

        $specialty = new Specialty();
        $specialty->name = "Ortopedia y Traumatología";
        $specialty->imageUrl = "https://clinicaortega.pe/webortega/wp-content/uploads/2017/10/TRAUMATOLOGIA-01-418x315.png";
        $specialty->description = "Ortopedia y Traumatología https://clinicaortega.pe/webortega/wp-content/uploads/2017/08/PSICOLOGIA-01-418x315.png";
        $specialty->save();

        $specialty = new Specialty();
        $specialty->name = "Otorrinolaringología";
        $specialty->imageUrl = "https://clinicaortega.pe/webortega/wp-content/uploads/2017/09/OTORRINO-01-418x315.png";
        $specialty->description = "Otorrinolaringología https://clinicaortega.pe/webortega/wp-content/uploads/2017/08/PSICOLOGIA-01-418x315.png";
        $specialty->save();

        $specialty = new Specialty();
        $specialty->name = "Patología Clínica";
        $specialty->imageUrl = "https://clinicaortega.pe/webortega/wp-content/uploads/2017/09/PATO-01-418x315.png";
        $specialty->description = "Patología Clínica https://clinicaortega.pe/webortega/wp-content/uploads/2017/08/PSICOLOGIA-01-418x315.png";
        $specialty->save();

        $specialty = new Specialty();
        $specialty->name = "Pediatría";
        $specialty->imageUrl = "https://clinicaortega.pe/webortega/wp-content/uploads/2017/09/PEDIATRIA-01-418x315.png";
        $specialty->description = "Pediatría https://clinicaortega.pe/webortega/wp-content/uploads/2017/08/PSICOLOGIA-01-418x315.png";
        $specialty->save();

        $specialty = new Specialty();
        $specialty->name = "Diagnóstico por Imágenes";
        $specialty->imageUrl = "https://clinicaortega.pe/webortega/wp-content/uploads/2019/01/RADIOGRAFIA-01-418x315.png";
        $specialty->description = "Diagnóstico por Imágenes https://clinicaortega.pe/webortega/wp-content/uploads/2017/08/PSICOLOGIA-01-418x315.png";
        $specialty->save();

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
