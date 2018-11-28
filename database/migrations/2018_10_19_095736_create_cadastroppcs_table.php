<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCadastroppcsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cadastroppcs', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->integer('curso_id')->unsigned()->nullable();
            $table->foreign('curso_id')
                    ->references('id')
                    ->on('cursos')
                    ->onDelete('cascade');
            $table->string('ppcCursoPerfil',100);
            $table->string('ppcEgressoPerfil',100);
            $table->string('ppcAcessoCurso',100);
            $table->string('ppcRepresentacao',100);
            $table->string('ppcAvalEnsino',100);
            $table->string('ppcAvalProjetoCurso',100);
            $table->string('ppcTcc',100);
            $table->string('ppcEstagio',100);
            $table->string('ppcPda',100);
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
        Schema::dropIfExists('cadastroppcs');
    }
}
