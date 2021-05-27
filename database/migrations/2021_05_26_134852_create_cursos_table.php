<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->id();
            $table->string('cod_curso');
            $table->string('nom_curso');
            $table->double('nota_max',10,3);
            $table->integer('num_horas_p');
            $table->integer('nom_horas_np');
            $table->string('estado_curso', 1);
            $table->unsignedBigInteger('area_id')->nullable();
            $table->foreign('area_id')->references('id')->on('areas')->onDelete('set null');
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
        Schema::dropIfExists('cursos');
    }
}
