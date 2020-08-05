<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnInUserMetaTable extends Migration
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
                $table->string('first_name')->after('user_id');
                $table->string('last_name')->after('first_name');
                $table->string('email')->after('last_name');
                $table->string('phone')->after('email');
                $table->string('avatar')->after('phone');
                $table->unsignedTinyInteger('type_user')->default(0)->after('avatar');
                $table->unsignedTinyInteger('gender')->default(0)->after('type_user');
                $table->date('dob')->after('gender');
                $table->string('occupation')->after('dob');
                $table->text('address_one')->after('occupation');
                $table->text('address_two')->after('address_one');
                $table->text('city')->after('address_two');
                $table->text('post_code')->after('city');
                $table->text('country')->after('post_code');
                if (Schema::hasColumn('user_metas', 'reason')) {
                    $table->text('reason')->nullable()->change();
                }
                if (Schema::hasColumn('user_metas', 'usage_criteria')) {
                    $table->text('usage_criteria')->nullable()->change();
                }
                if (Schema::hasColumn('user_metas', 'bring_to')) {
                    $table->text('bring_to')->nullable()->change();
                }
                if (Schema::hasColumn('user_metas', 'member_other')) {
                    $table->text('member_other')->nullable()->change();
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
            $table->dropColumn('first_name');
            $table->dropColumn('last_name');
            $table->dropColumn('email');
            $table->dropColumn('phone');
            $table->dropColumn('avatar');
            $table->dropColumn('type_user');
            $table->dropColumn('gender');
            $table->dropColumn('dob');
            $table->dropColumn('occupation');
            $table->dropColumn('address_one');
            $table->dropColumn('address_two');
            $table->dropColumn('city');
            $table->dropColumn('post_code');
            $table->dropColumn('country');

            $table->text('reason')->nullable(false)->change();
            $table->text('usage_criteria')->nullable(false)->change();
            $table->text('bring_to')->nullable(false)->change();
            $table->text('member_other')->nullable(false)->change();
        });
    }
}
