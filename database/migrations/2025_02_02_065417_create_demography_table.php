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
        Schema::create('demography', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('member');
            $table->unsignedBigInteger('household');
            $table->timestamp('date_of_birth');
            $table->string('birthplace');
            $table->boolean('born_in_town');
            $table->boolean('living_in_village_since_birth');
            $table->integer('years_lived_in_village');
            $table->string('religion');
            $table->string('nationality');
            $table->string('ethnicity');
            $table->integer('age');
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
        Schema::dropIfExists('demography');
    }
};
