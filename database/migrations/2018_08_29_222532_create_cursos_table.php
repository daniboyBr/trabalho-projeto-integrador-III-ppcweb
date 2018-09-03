<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('tipoCurso', 100);
            $table->string('modalidade', 100);
            $table->string('denominacaoCurso', 150);
            $table->string('habilitacao', 100);
            $table->string('localOferta', 150);
            $table->string('turnoFuncionamento', 50);
            $table->integer('vagaTurno');
            $table->integer('cargaHorariaCurso');
            $table->string('regimeLetivo', 100);
            $table->string('periodos', 100);
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
