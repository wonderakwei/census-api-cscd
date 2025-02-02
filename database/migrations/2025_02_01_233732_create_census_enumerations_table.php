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
        Schema::create('census_enumerations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('household');
            $table->timestamp('date_started')->nullable();;
            $table->timestamp('date_completed')->nullable();;
            $table->integer('total_visits');
            $table->unsignedBigInteger('enumerator');
            $table->foreign('household')->references('id')->on('households');
            $table->foreign('enumerator')->references('id')->on('enumerators');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('census_enumerations');
    }
};
