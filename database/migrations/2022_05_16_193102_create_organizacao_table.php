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
            $table->increments('id')->unsigned();
            $table->integer('posts')->unsigned()->default(0);
            $table->string('nome');
            $table->binary('logo')->nullable();
            $table->binary('logo_alternativa')->nullable();
            $table->string('descricao')->nullable();
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
        Schema::drop('organizacaos');
        Schema::enableForeignKeyConstraints();
    }
}
