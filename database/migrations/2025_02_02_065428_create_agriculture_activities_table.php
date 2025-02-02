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
        Schema::create('agriculture_activities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('household');
            $table->boolean('crop_farming');
            $table->boolean('tree_growing');
            $table->boolean('livestock_rearing');
            $table->boolean('fish_farming');
            $table->integer('male_members_in_farming');
            $table->integer('female_members_in_farming');
            $table->foreign('household')->references('id')->on('households');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agriculture_activities');
    }
};
