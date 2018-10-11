<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoordenadorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coordenadors', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('nomeCoordenador',100);
            $table->string('cpfCoordenador',11);
            $table->string('titulacaoCoordenador',50);
            $table->string('tempoDedicacaoCoordenador',50);
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('cursos', function (Blueprint $table){
            $table->integer('coordenador_id')->unsigned();
            $table->foreign('coordenador_id')->references('id')->on('coordenadors');
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
        Schema::dropIfExists('coordenadors');
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
