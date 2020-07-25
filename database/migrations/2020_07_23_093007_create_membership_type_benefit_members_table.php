<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembershipTypeBenefitMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (! Schema::hasTable('membership_type_benefit_members')) {
            Schema::create('membership_type_benefit_members', function (Blueprint $table) {
                if (Schema::hasTable('membership_types')) {
                    $table->unsignedBigInteger('membership_type_id');
                    $table->foreign('membership_type_id')->references('id')->on('membership_types')->onDelete('cascade');
                }
                if (Schema::hasTable('benefit_members')) {
                    $table->unsignedBigInteger('benefit_member_id');
                    $table->foreign('benefit_member_id')->references('id')->on('benefit_members')->onDelete('cascade');
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
        Schema::dropIfExists('membership_type_benefit_members');
    }
}
