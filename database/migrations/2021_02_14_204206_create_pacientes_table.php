<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->bigIncrements('id_paciente');

            $table->string('nombre_pac', 30);
            $table->string('ap_pat_pac', 30);
            $table->string('ap_mat_pac', 30);
            $table->date('fecha_nac');
            $table->enum('sexo_pac', ['M', 'F']);
            $table->string('telefono_pac', 30);
            $table->string('email_pac', 50)->unique();
            $table->string('password_pac');
            $table->string('foto_pac', 100)->nullable();
            $table->string('estado', 100);
            $table->string('municipio', 100);
            $table->string('cp', 10);
            $table->string('calle', 100);
            $table->string('numero', 100);

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
        Schema::dropIfExists('pacientes');
    }
}
