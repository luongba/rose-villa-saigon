<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnForApproveUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('users')) {
            Schema::table('users', function(Blueprint $table) {
                if (! Schema::hasColumn('users', 'gender')) {
                    $table->unsignedTinyInteger('gender')->default(0)->after('phone_verified_at');
                }
                if (! Schema::hasColumn('users', 'dob')) {
                    $table->date('dob')->nullable()->after('gender');
                }
                if (! Schema::hasColumn('users', 'occupation')) {
                    $table->string('occupation')->after('dob');
                }
                if (! Schema::hasColumn('users', 'address_one')) {
                    $table->text('address_one')->after('occupation');
                }
                if (! Schema::hasColumn('users', 'address_two')) {
                    $table->text('address_two')->after('address_one');
                }
                if (! Schema::hasColumn('users', 'city')) {
                    $table->text('city')->after('address_two');
                }
                if (! Schema::hasColumn('users', 'post_code')) {
                    $table->text('post_code')->after('city');
                }
                if (! Schema::hasColumn('users', 'country')) {
                    $table->text('country')->after('post_code');
                }
                if (! Schema::hasColumn('users', 'reason')) {
                    $table->text('reason')->nullable();
                }
                if (! Schema::hasColumn('users', 'usage_criteria')) {
                    $table->text('usage_criteria')->nullable();
                }
                if (! Schema::hasColumn('users', 'bring_to')) {
                    $table->text('bring_to')->nullable();
                }
                if (! Schema::hasColumn('users', 'member_other')) {
                    $table->text('member_other')->nullable();
                }
                if (! Schema::hasColumn('users', 'membership_type_id')) {
                    if (Schema::hasTable('membership_types')) {
                        $table->unsignedBigInteger('membership_type_id')->after('member_other');
                        $table->foreign('membership_type_id')->references('id')->on('membership_types');
                    }
                }
                if (! Schema::hasColumn('users', 'frequency')) {
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
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('gender');
            $table->dropColumn('dob');
            $table->dropColumn('occupation');
            $table->dropColumn('address_one');
            $table->dropColumn('address_two');
            $table->dropColumn('city');
            $table->dropColumn('post_code');
            $table->dropColumn('country');
            $table->dropColumn('reason');
            $table->dropColumn('usage_criteria');
            $table->dropColumn('bring_to');
            $table->dropColumn('member_other');
            $table->dropColumn('membership_type_id');
            $table->dropColumn('frequency');
        });
    }
}
