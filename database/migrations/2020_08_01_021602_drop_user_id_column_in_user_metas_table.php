<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropUserIdColumnInUserMetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('user_metas')) {
            Schema::table('user_metas', function (Blueprint $table) {
                if (Schema::hasColumn('user_metas', 'user_id')) {
                    $table->dropForeign('user_metas_user_id_foreign');
                    $table->dropColumn('user_id');
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_metas', function (Blueprint $table) {
            if (Schema::hasTable('users')) {
                $table->unsignedBigInteger('user_id')->after('id');
                $table->foreign('user_id')->references('id')->on('users');
            }
        });
    }
}
