<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersTable extends Migration
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
                if (Schema::hasColumn('users', 'email')) {
                    $table->string('email')->nullable()->change();
                }
                if (Schema::hasColumn('users', 'dob')) {
                    $table->date('dob')->nullable()->change();
                }
                if (Schema::hasColumn('users', 'occupation')) {
                    $table->string('occupation')->nullable()->change();
                }
                if (Schema::hasColumn('users', 'address_one')) {
                    $table->text('address_one')->nullable()->change();
                }
                if (Schema::hasColumn('users', 'city')) {
                    $table->text('city')->nullable()->change();
                }
                if (Schema::hasColumn('users', 'post_code')) {
                    $table->text('post_code')->nullable()->change();
                }
                if (Schema::hasColumn('users', 'country')) {
                    $table->text('country')->nullable()->change();
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
            $table->string('email')->nullable(false)->change();
            $table->date('dob')->nullable(false)->change();
            $table->string('occupation')->nullable(false)->change();
            $table->text('address_one')->nullable(false)->change();
            $table->text('city')->nullable(false)->change();
            $table->text('post_code')->nullable(false)->change();
            $table->text('country')->nullable(false)->change();
        });
    }
}
