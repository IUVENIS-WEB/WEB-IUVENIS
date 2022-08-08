<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableUsersAddColumnOrganizacaoId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
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
        Schema::table('users', function (Blueprint $table) {

            // 1. Drop foreign key constraints
            $table->dropForeign(['organizacao_id']);

            // 2. Drop the column
            $table->dropColumn('organizacao_id');
        });
    }
}
