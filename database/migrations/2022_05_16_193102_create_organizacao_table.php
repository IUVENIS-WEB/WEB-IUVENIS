<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrganizacaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organizacaos', function (Blueprint $table) {
            $table->boolean('adm_power');
            $table->increments('id')->unsigned();;
            $table->integer('posts')->unsigned();
            $table->string('nome');
            $table->binary('logo');
            $table->binary('logo_alternativa');
            $table->string('descricao');    
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
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
