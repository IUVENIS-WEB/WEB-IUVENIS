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
            $table->timestamps();
            $table->increments('id')->unsigned();
            $table->string('titulo');
            $table->string('resumo')->nullable();    
            $table->string('imagem')->nullable();
            $table->enum('tipo', ['evento', 'video', 'artigo']);
            $table->string('link_evento')->nullable();
            $table->date('data_evento')->nullable();
            $table->string('link_midia')->nullable();
            $table->float('duracao')->unsigned()->nullable();
            $table->date('lançamento')->nullable();
            $table->string('arquivo')->nullable();
            $table->integer('denunciasContagem')->default(0);
            $table->boolean('excluido')->default(0);
            $table->boolean('comentario')->default(0);
            
            $table->integer('autor_id')->unsigned();
            $table->integer('pai_id')->unsigned()->nullable();
            $table->integer('organizacao_id')->unsigned();
            
            $table->foreign('pai_id')->references('id')->on('posts');
            $table->foreign('autor_id')->references('id')->on('users');
            $table->foreign('organizacao_id')->references('id')->on('organizacaos');
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
        Schema::dropIfExists('posts');
        Schema::enableForeignKeyConstraints();
    }
}
