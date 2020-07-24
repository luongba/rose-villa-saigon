<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingWellnessBeautiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (! Schema::hasTable('booking_wellness_beauties')) {
            Schema::create('booking_wellness_beauties', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('email');
                $table->string('phone');
                $table->unsignedTinyInteger('number_guest');
                if (Schema::hasTable('wellness_beauties')) {
                    $table->unsignedBigInteger('wellness_beauty_id');
                    $table->foreign('wellness_beauty_id')->references('id')->on('wellness_beauties');
                }
                $table->dateTime('start_at');
                $table->text('description');
                $table->unsignedTinyInteger('status')->default(0);
                $table->timestamps();
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
        Schema::dropIfExists('booking_wellness_beauties');
    }
}
