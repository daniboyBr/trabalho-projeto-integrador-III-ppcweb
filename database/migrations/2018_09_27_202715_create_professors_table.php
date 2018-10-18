<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfessorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nomeProfessor',100)->nullable(false);
            $table->string('cpfProfessor',11)->nullable(false)->unique();
            $table->string('maiorTitulacao',100)->nullable(false);
            $table->string('areaFormacao',100)->nullable(false);
            $table->string('curriculoLates',100)->nullable(false);
            $table->date('dataAtualizacaoCurriculo')->nullable(false);
            $table->string('matriculaProfessor',10)->nullable(false);
            $table->date('dataAdmissao')->nullable(false);
            $table->integer('horasNDE')->default('0');
            $table->integer('horasOrientacaoTCC')->nullale(false)->default('0');
            $table->integer('horasCoordenacaoCurso')->default('0');
            $table->integer('horasCoordenacaoOutrosCursos')->nullale(false)->default('0');
            $table->integer('horasPesquisaSmAtual')->nullable(false)->default('0');
            $table->integer('horasAtividadeExtraClasse')->nullable(false)->default('0');
            $table->integer('horasAtividadeExtClasseOutrosCursos')->nullable(false)->default('0');
            $table->integer('qtdHorasCurso')->nullable(false)->default('0');
            $table->integer('qtdHorasOutrosCurso')->nullable(false)->default('0');
            $table->tinyInteger('membroNDE')->nullable(false)->default('0');
            $table->tinyInteger('membroColegiado')->nullable(false)->default('0');
            $table->tinyInteger('docenteFCEP')->nullable(false)->default('0');
            $table->date('tempoVinculo')->nullable(false);
            $table->date('tempoCursosEAD')->nullable(false);
            $table->date('tempoExpMagisterioSuperior')->nullable(false);
            $table->date('tempoExpProfissional')->nullable(false);
            $table->integer('qtdTraducoes')->nullable(false)->default('0');
            $table->integer('qtdParicipacaoEventos')->nullable(false)->default('0');
            $table->integer('qtdArtigosNaArea')->nullable(false)->default('0');
            $table->integer('qtdArtigosOutrasAreas')->nullable(false)->default('0');
            $table->integer('qtdLivrosNaArea')->nullable(false)->default('0');
            $table->integer('qtdLivrosOutrasAreas')->nullable(false)->default('0');
            $table->integer('qtdTrabalhosEmAnaisCompletos')->nullable(false)->default('0');
            $table->integer('qtdTrabalhosEmAnaisResumo')->nullable(false)->default('0');
            $table->integer('qtdPropriedadeIntelectualDepositada')->nullabel(false)->default('0');
            $table->integer('qtdPropriedadeIntelectualRegistrada')->nullabel(false)->default('0');
            $table->integer('qtdProjetosArtiticosCulturais')->nullabel(false)->default('0');
            $table->integer('qtdProducaoDidaticoPedagogica')->nullabel(false)->default('0');
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
        Schema::dropIfExists('professors');
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
