<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citas', function (Blueprint $table) {
            $table->bigIncrements('id_cita');

            $table->date('fecha_cita')->comment('Fecha en la que sera la cita');
            $table->time('hora')->comment('Hora de la cita');
            $table->unsignedBigInteger('id_doctor');
            $table->unsignedBigInteger('id_paciente');
            $table->unsignedBigInteger('id_consultorio');

            $table->foreign('id_doctor')->references('id_doctor')->on('doctores')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('id_paciente')->references('id_paciente')->on('pacientes')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('id_consultorio')->references('id_consultorio')->on('consultorios')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->softDeletes();
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
        Schema::dropIfExists('citas');
    }
}
