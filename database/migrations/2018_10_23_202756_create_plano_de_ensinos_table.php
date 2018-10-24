<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlanoDeEnsinosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plano_de_ensinos', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('curso_id')->unsigned();
            $table->integer('professor_id')->unsigned();
            $table->integer('disciplina_id')->unsigned();
            $table->text('ementa')->nullable(false);
            $table->text('competenciaHabilidades')->nullable(false);;
            $table->text('metodologiaDeEnsino')->nullable(false);
            $table->text('avaliacao')->nullable(false);
            $table->string('periodoDoCurso',50);
            $table->string('ano',10);
            $table->bigInteger('cargaHorariaSemestral');
            $table->string('semestre',10);
            $table->foreign('professor_id')->references('id')->on('professors');
            $table->foreign('disciplina_id')->references('id')->on('disciplinas')->onDelete('cascade');
            $table->foreign('curso_id')->references('id')->on('cursos');
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
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Schema::dropIfExists('plano_de_ensinos');
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    }
}
