<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCronogramaDeAtividadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cronograma_de_atividades', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('aula');
            $table->string('conteudo');
            $table->integer('planoDeEnsino_id')->unsigned();
            $table->foreign('planoDeEnsino_id')->references('id')->on('plano_de_ensinos')->onDelete('cascade');
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
        Schema::dropIfExists('cronograma_de_atividades');
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    }
}
