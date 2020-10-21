<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeUserMetasTable extends Migration
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
                if (Schema::hasColumn('user_metas', 'membership_type_id')) {
                    $table->unsignedBigInteger('membership_type_id')->nullable()->change();
                }
                if (Schema::hasColumn('user_metas', 'frequency')) {
                    $table->string('frequency')->nullable()->change();
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
        chema::table('user_metas', function (Blueprint $table) {
            $table->unsignedBigInteger('membership_type_id')->nullable(false)->change();
            $table->string('frequency')->nullable(false)->change();
        });
    }
}
