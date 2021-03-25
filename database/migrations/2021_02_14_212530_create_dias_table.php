<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dias', function (Blueprint $table) {
            $table->bigIncrements('id_dia');


            $table->string('nombre_dia', 10);
            $table->unsignedBigInteger('id_doctor');
            $table->unsignedBigInteger('id_horario');

            $table->foreign('id_doctor')->references('id_doctor')->on('doctores')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('id_horario')->references('id_horario')->on('horarios')
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
        Schema::dropIfExists('dias');
    }
}
