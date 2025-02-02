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
    { Schema::create('emigration', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('household');
        $table->string('name');
        $table->string('relationship_to_head');
        $table->string('sex');
        $table->integer('age');
        $table->string('destination');
        $table->string('destination_code');
        $table->string('activity_abroad');
        $table->foreign('household')->references('id')->on('households');
        $table->timestamps();
    });
        Schema::create('emigration', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emigration');
    }
};
