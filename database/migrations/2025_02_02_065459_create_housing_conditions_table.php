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
        Schema::create('housing_conditions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('household');
            $table->string('type_of_dwelling');
            $table->string('outer_wall_material');
            $table->string('floor_material');
            $table->string('roof_material');
            $table->string('tenure_arrangement');
            $table->string('ownership_type');
            $table->integer('rooms_occupied');
            $table->integer('total_bedrooms');
            $table->boolean('shared_bedroom');
            $table->integer('number_of_households_sharing_bedroom');
            $table->string('main_light_source');
            $table->string('main_water_supply_drinking');
            $table->string('main_water_supply_domestic');
            $table->string('main_cooking_fuel');
            $table->string('cooking_space');
            $table->string('bathing_facility');
            $table->string('toilet_facility');
            $table->string('sharing_toilet_mechanism');
            $table->integer('number_of_households_sharing_toilet');
            $table->string('solid_refuse_disposal');
            $table->string('liquid_waste_disposal');
            $table->foreign('household')->references('id')->on('households');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('housing_conditions');
    }
};
