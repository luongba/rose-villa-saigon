<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (! Schema::hasTable('booking_rooms')) {
            Schema::create('booking_rooms', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('email');
                $table->string('phone');
                $table->unsignedTinyInteger('number_guest');
                if (Schema::hasTable('rooms')) {
                    $table->unsignedBigInteger('room_id');
                    $table->foreign('room_id')->references('id')->on('rooms');
                }
                $table->date('start_at');
                $table->date('end_at');
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
        Schema::dropIfExists('booking_rooms');
    }
}
