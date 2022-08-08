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
            $table->timestamps();
            // $table->boolean('adm_power');
            $table->increments('id')->unsigned();
            $table->integer('post_count')->unsigned()->default(0);
            $table->string('nome');
            $table->string('logo')->nullable();
            $table->string('logo_alternativa')->nullable();
            $table->string('descricao')->nullable();
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
        Schema::dropIfExists('organizacaos');
        Schema::enableForeignKeyConstraints();
    }
}
