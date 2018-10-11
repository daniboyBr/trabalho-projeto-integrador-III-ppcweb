<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDisciplinasMinistradasOutrosCursos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disciplinas_ministradas_outros_cursos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('curso')->nullable(false);
            $table->string('disciplina',100)->nullable(false);
            $table->integer('cargaHoraria')->nullable(false);
            $table->integer('professor_id')->unsigned();
            $table->foreign('professor_id')->references('id')->on('professors');
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
        Schema::dropIfExists('disciplinas_ministradas_outros_cursos');
    }
}
