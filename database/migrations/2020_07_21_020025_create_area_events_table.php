<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAreaEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (! Schema::hasTable('area_events')) {
            Schema::create('area_events', function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->text('description');
                $table->string('thumbnail');
                $table->json('gallery')->nullable();
                $table->unsignedTinyInteger('status')->default(0);
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
        Schema::dropIfExists('area_events');
    }
}
