<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterSalvosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('salvos', function (Blueprint $table) {
            $table->integer('colecao_id')->unsigned()->nullable();
            $table->foreign('colecao_id')->references('id')->on('colecaos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::disableForeignKeyConstraints();
        Schema::table('salvos', function (Blueprint $table) {
            $table->dropForeign(['colecao_id']);
            $table->dropColumn('colecao_id');
        });
        // Schema::enableForeignKeyConstraints();
    }
}
