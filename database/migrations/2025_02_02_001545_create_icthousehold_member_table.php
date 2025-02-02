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
        Schema::create('icthousehold_member', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('member');
            $table->unsignedBigInteger('household');
            $table->boolean('has_phone');
            $table->boolean('has_internet');
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
        Schema::dropIfExists('icthousehold_member');
    }
};
