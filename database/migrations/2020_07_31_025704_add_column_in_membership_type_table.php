<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnInMembershipTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('membership_types')) {
            Schema::table('membership_types', function (Blueprint $table) {
                $table->json('price')->nullable()->after('day');
                $table->unsignedTinyInteger('type')->nullable()->after('price');
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
        Schema::table('membership_types', function (Blueprint $table) {
            $table->dropColumn('price');
            $table->dropColumn('type');
        });
    }
}
