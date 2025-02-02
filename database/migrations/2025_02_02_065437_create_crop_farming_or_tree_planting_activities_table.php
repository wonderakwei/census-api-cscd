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
        Schema::create('crop_farming_or_tree_planting_activities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('household');
            $table->string('type_of_crop_tree_planting');
            $table->string('crop_code');
            $table->integer('farm_size');
            $table->string('measurement_unit');
            $table->string('type_of_cropping');
            $table->foreign('household')->references('id')->on('households');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('crop_farming_or_tree_planting_activities');
    }
};
