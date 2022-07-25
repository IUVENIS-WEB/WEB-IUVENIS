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
        Schema::create('posts', function (Blueprint $table) {
            //colums
            $table->increments('id')->unsigned();;
            $table->string('titulo');
            $table->string('resumo');    
            $table->binary('imagem')->nullable();
            $table->enum('tipo', ['evento', 'video', 'artigo']);
            $table->string('link_evento')->nullable();
            $table->date('data_evento')->nullable();
            $table->string('link_midia')->nullable();
            $table->float('tempo')->unsigned()->nullable();
            $table->date('lançamento')->nullable();
            $table->binary('arquivo')->nullable();
            $table->string('tags')->nullable();
            $table->integer('denunciasContagem')->default(0);
            $table->boolean('excluido');
            $table->integer('user_id')->unsigned();
            $table->boolean('comentario')->default(0);
            $table->integer('pai_id')->unsigned()->nullable();
            $table->foreign('pai_id')->references('id')->on('posts');
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('organizacao_id')->unsigned();
            $table->foreign('organizacao_id')->references('id')->on('organizacaos');
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
        Schema::disableForeignKeyConstraints();
        Schema::drop('posts');
        Schema::enableForeignKeyConstraints();
    }
}
