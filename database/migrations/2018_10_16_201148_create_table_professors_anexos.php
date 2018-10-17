<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProfessorsAnexos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anexos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('comprovante',50);
            $table->date('data');
            $table->string('local',50);
            $table->string('arquivo',50);
            $table->integer('tipoComprovante');// 1 para Eventos e 2 para Publicação
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
