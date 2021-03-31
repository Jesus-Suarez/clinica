<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultaTratamientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consulta_tratamientos', function (Blueprint $table) {
            $table->bigIncrements('id_cons_trat');

            $table->integer('cant_med')
                ->unsigned()
                ->comment('Cantidad de medicamentos que se venden en la consulta'); /* solo permite numeros enteros sin signo */

            $table->unsignedBigInteger('id_consulta');
            $table->unsignedBigInteger('id_estudio');
            $table->unsignedBigInteger('id_medicamento');

            $table->foreign('id_consulta')->references('id_consulta')->on('consultas')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('id_estudio')->references('id_estudio')->on('estudios')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('id_medicamento')->references('id_medicamento')->on('medicamentos')
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
        Schema::dropIfExists('consulta_tratamientos');
    }
}
