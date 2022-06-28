<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->boolean('adm_power');
            $table->increments('id')->unsigned();
            $table->binary('foto')->nullable();
            $table->integer('posts')->default(0);
            $table->string('nome');
            $table->string('sobrenome');
            $table->string('bio')->nullable();
            $table->string('descricao')->nullable();
            $table->date('nascimento');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            $table->integer('organizacao_id')->unsigned()->nullable();
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
        Schema::drop('users');
        Schema::enableForeignKeyConstraints();
    }
}
