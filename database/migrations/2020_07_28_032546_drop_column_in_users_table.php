<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropColumnInUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('users')) {
            Schema::table('users', function (Blueprint $table) {
                if (Schema::hasColumn('users', 'gender')) {
                    $table->dropColumn('gender');
                }
                if (Schema::hasColumn('users', 'dob')) {
                    $table->dropColumn('dob');
                }
                if (Schema::hasColumn('users', 'occupation')) {
                    $table->dropColumn('occupation');
                }
                if (Schema::hasColumn('users', 'address_one')) {
                    $table->dropColumn('address_one');
                }
                if (Schema::hasColumn('users', 'address_two')) {
                    $table->dropColumn('address_two');
                }
                if (Schema::hasColumn('users', 'city')) {
                    $table->dropColumn('city');
                }
                if (Schema::hasColumn('users', 'post_code')) {
                    $table->dropColumn('post_code');
                }
                if (Schema::hasColumn('users', 'country')) {
                    $table->dropColumn('country');
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
            $table->tinyInteger('gender')->unsigned()->default(0)->after('phone_verified_at');
            $table->date('dob')->nullable()->after('gender');
            $table->string('occupation')->nullable()->after('dob');
            $table->text('address_one')->nullable()->after('occupation');
            $table->text('address_two')->nullable()->after('address_one');
            $table->text('city')->nullable()->after('address_two');
            $table->text('post_code')->nullable()->after('city');
            $table->text('country')->nullable()->after('post_code');
        });
    }
}
