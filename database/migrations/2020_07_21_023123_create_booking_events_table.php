<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (! Schema::hasTable('booking_events')) {
            Schema::create('booking_events', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('email');
                $table->string('phone');
                $table->unsignedTinyInteger('number_guest');
                if (Schema::hasTable('area_events')) {
                    $table->unsignedBigInteger('area_event_id');
                    $table->foreign('area_event_id')->references('id')->on('area_events');
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
        Schema::dropIfExists('booking_events');
    }
}
