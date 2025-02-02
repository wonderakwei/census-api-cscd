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
        Schema::create('households', function (Blueprint $table) {
            $table->id();
            $table->string('region');
            $table->string('district');
            $table->string('locality');
            $table->string('address');
            $table->string('head');
            $table->integer('ea_number');
            $table->string('subdistrict');
            $table->string('district_type');
            $table->string('ea_type');
            $table->integer('structure_number');
            $table->integer('household_number');
            $table->string('type_of_residence');
            $table->string('contact_number1');
            $table->string('contact_number2');
            $table->string('nhis_vra_other_number');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('households');
    }
};
