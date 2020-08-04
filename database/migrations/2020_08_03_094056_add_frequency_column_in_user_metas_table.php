<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFrequencyColumnInUserMetasTable extends Migration
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
                if (! Schema::hasColumn('user_metas', 'frequency')) {
                    $table->string('frequency')->after('membership_type_id');
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
            $table->dropColumn('frequency');
        });
    }
}
