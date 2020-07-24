<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (! Schema::hasTable('users')) {
            Schema::create('users', function (Blueprint $table) {
                $table->id();
                $table->string('first_name');
                $table->string('last_name');
                $table->string('email')->unique();
                $table->timestamp('email_verified_at')->nullable();
                $table->string('password');
                $table->string('phone')->unique();
                $table->timestamp('phone_verified_at')->nullable();
                $table->tinyInteger('gender')->unsigned()->default(0);
                $table->date('dob');
                $table->string('occupation');
                $table->text('address_one');
                $table->text('address_two')->nullable();
                $table->text('city');
                $table->text('post_code');
                $table->text('country');
                $table->tinyInteger('status')->unsigned()->default(0);
                $table->rememberToken();
                $table->timestamps();
                $table->softDeletes();
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
        Schema::dropIfExists('users');
    }
}
