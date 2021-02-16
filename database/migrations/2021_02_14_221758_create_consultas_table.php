<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultas', function (Blueprint $table) {
            $table->bigIncrements('id_consulta');

            $table->float('costo');
            $table->unsignedBigInteger('id_cita');
            $table->unsignedBigInteger('id_tratamiento');

            $table->foreign('id_cita')->references('id_cita')->on('citas')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('id_tratamiento')->references('id_tratamiento')->on('tratamientos')
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
        Schema::dropIfExists('consultas');
    }
}
