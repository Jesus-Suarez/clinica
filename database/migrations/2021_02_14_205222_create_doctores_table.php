<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctores', function (Blueprint $table) {
            $table->bigIncrements('id_doctor');

            $table->string('nombre_doc', 30);
            $table->string('ap_pat_doc', 30);
            $table->string('ap_mat_doc', 30);
            $table->enum('sexo_doc', ['M', 'F']);
            $table->date('fecha_nac');
            $table->string('telefono_doc', 30);
            $table->enum('tipo', ['admin', 'doctor']);
            $table->string('email_doc', 50)->unique();
            $table->string('password_doc');
            $table->string('foto_doc', 100)->nullable();
            $table->unsignedBigInteger('especialidad_id')->nullable();

            $table->foreign('especialidad_id')->references('especialidad_id')->on('especialidades')
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
        Schema::dropIfExists('doctores');
    }
}
