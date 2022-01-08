<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DetalhesExperiencias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalhes_experiencias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('detalhes');
            $table->integer('experiencias_id')->unsigned()->index();
            $table->foreign('experiencias_id')->references('id')->on('experiencias');
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
