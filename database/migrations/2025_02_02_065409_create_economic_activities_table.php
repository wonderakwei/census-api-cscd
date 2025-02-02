<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('economic_activities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('member');
            $table->unsignedBigInteger('household');
            $table->boolean('working_past_7days');
            $table->string('activity_engaged');
            $table->string('reason_not_working');
            $table->string('occupation_code');
            $table->string('detailed_occupation');
            $table->string('employment_status');
            $table->string('employment_sector');
            $table->string('name_of_establishment');
            $table->string('location_of_establishment');
            $table->string('main_product_service_code');
            $table->foreign('member')->references('id')->on('household_members');
            $table->foreign('household')->references('id')->on('households');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('economic_activities');
    }
};
