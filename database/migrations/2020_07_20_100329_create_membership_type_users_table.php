<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembershipTypeUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (! Schema::hasTable('membership_type_users')) {
            Schema::create('membership_type_users', function (Blueprint $table) {
                if (Schema::hasTable('membership_types')) {
                    $table->unsignedBigInteger('membership_type_id');
                    $table->foreign('membership_type_id')->references('id')->on('membership_types')->onDelete('cascade');
                }
                if (Schema::hasTable('users')) {
                    $table->unsignedBigInteger('user_id');
                    $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('membership_type_users');
    }
}
