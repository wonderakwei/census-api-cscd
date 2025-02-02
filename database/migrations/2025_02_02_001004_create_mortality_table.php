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
        Schema::create('mortality', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('household');
            $table->string('name');
            $table->boolean('had_unnatural_death');
            $table->string('sex');
            $table->integer('age');
            $table->boolean('death_related_to_birth');
            $table->foreign('household')->references('id')->on('households');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mortality');
    }
};
