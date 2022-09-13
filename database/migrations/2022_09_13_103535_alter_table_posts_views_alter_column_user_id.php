<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTablePostsViewsAlterColumnUserId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::table('post_views', function (Blueprint $table) {
            // $table->dropForeign(['post_views_user_id_foreign']);
            $table->integer('user_id')->nullable()->change();
            // $table->foreign('user_id')->references('id')->on('users');
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::table('post_views', function (Blueprint $table) {
            $table->integer('user_id')->change();
        });
        Schema::enableForeignKeyConstraints();
    }
}
