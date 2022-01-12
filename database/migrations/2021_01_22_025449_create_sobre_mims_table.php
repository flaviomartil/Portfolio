<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSobreMimsTable extends Migration
{
    /**
     * Run the migrations.
     * 'nome', 'website', 'telefone','cidade_atual','idade','email','freelance_status'
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sobre_mims', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('website');
            $table->string('telefone');
            $table->string('cidade_atual');
            $table->integer('idade');
            $table->string('email');
            $table->string('email_profissional');
            $table->string('freelance_status');
            $table->date('aniversario');
            $table->string('endereco');
            $table->string('cep')->nullable();
            $table->string('resumo');
            $table->string('msgPrincipal');
            $table->string('msgTopo');
            $table->string('msgDigitada');
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
        Schema::dropIfExists('sobre_mims');
    }
}
