<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIndices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bleets', function (Blueprint $table) {
            $table->index('user_id');
        });
        Schema::table('bleet_user', function (Blueprint $table) {
            $table->index(['user_id', 'bleet_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bleets', function (Blueprint $table) {
            $table->dropIndex('bleets_user_id_index');
        });
        Schema::table('bleet_user', function (Blueprint $table) {
            $table->dropIndex('bleet_user_user_id_bleet_id_index');
        });

    }
}
