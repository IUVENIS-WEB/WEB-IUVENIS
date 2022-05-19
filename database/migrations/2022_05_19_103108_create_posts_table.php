<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('posts');
        Schema::create('posts', function (Blueprint $table) {
            //colums
            $table->increments('id')->unsigned();;
            $table->string('título');
            $table->string('descricao');    
            $table->string('tipo');
            $table->string('link_evento');
            $table->date('data_evento');
            $table->string('link_midia');
            $table->float('tempo')->unsigned();
            $table->date('lançamento');

            /* 
            O que devemos usar?
            $table-?('arquivo');
            */
            //foreign keys
            //$table->integer('user_id')->unsigned();
            //$table->foreign('user_id')->references('id')->on('users');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('organizacao_id')->unsigned();
            $table->foreign('organizacao_id')->references('id')->on('organizacao');
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
