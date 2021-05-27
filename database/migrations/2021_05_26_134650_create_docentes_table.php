<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docentes', function (Blueprint $table) {
            $table->id();
            $table->string('cod_docente',10);
            $table->string('nom_docente',20);
            $table->string('pat_docente',30);
            $table->string('mat_docente',30);
            $table->string('dni_docente',8);
            $table->string('email_docente',50);
            $table->string('tel_docente',12);
            $table->string('sexo_docente',1);
            $table->date('f_nac_docente');
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
        Schema::dropIfExists('docentes');
    }
}
