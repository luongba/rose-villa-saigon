<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMembershipTypeInUserMetasTable extends Migration
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
                if (! Schema::hasColumn('user_metas', 'membership_type_id')) {
                    if (Schema::hasTable('membership_types')) {
                        $table->unsignedBigInteger('membership_type_id')->after('member_other');
                        $table->foreign('membership_type_id')->references('id')->on('membership_types');
                    }
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
            if (Schema::hasColumn('user_metas', 'membership_type_id')) {
                $table->dropForeign('user_metas_membership_type_id_foreign');
                $table->dropColumn('membership_type_id');
            }
        });
    }
}
