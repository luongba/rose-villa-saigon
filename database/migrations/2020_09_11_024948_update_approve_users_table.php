<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateApproveUsersTable extends Migration
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
                if (Schema::hasColumn('users', 'address_two')) {
                    $table->text('address_two')->nullable()->change();
                }
                if (Schema::hasColumn('users', 'membership_type_id')) {
                    $table->unsignedBigInteger('membership_type_id')->nullable()->change();
                }
                if (Schema::hasColumn('users', 'frequency')) {
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
        Schema::table('user_metas', function (Blueprint $table) {
            $table->text('address_two')->nullable(false)->change();
            $table->unsignedBigInteger('membership_type_id')->nullable(false)->change();
            $table->string('frequency')->nullable(false)->change();
        });
    }
}
