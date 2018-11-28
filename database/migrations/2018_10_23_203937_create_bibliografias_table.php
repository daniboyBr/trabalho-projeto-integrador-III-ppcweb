<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBibliografiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bibliografias', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('titulo', 100)->nullable(false);
            $table->string('autor', 100)->nullable(false);
            $table->string('isbn', 50)->nullable(false);
            $table->integer('ano')->nullable(false);
            $table->string('editora', 100)->nullable(false);
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
        Schema::dropIfExists('bibliografias');
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    }
}
