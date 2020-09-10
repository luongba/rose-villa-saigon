<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnSlugInAreaPartiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('area_parties', function (Blueprint $table) {
            if (! Schema::hasColumn('area_parties', 'slug')) {
                $table->string('slug')->after('title');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('area_parties', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
}
