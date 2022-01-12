<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FluxoTrabalhos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fluxo_trabalhos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('usuario_id')->unsigned()->index();
            $table->string('detalhes');
            $table->foreign('usuario_id')->references('id')->on('users');
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
        //
    }
}
