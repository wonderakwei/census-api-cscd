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
        Schema::create('livestock_or_fisheries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('household');
            $table->string('type_of_livestock_fisheries');
            $table->string('code');
            $table->integer('number');
            $table->foreign('household')->references('id')->on('households');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livestock_or_fisheries');
    }
};
