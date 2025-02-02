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
        Schema::create('disability', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('member');
            $table->unsignedBigInteger('household');
            $table->boolean('sight');
            $table->boolean('hearing');
            $table->boolean('physical');
            $table->boolean('intellectual');
            $table->boolean('emotional');
            $table->boolean('speech');
            $table->boolean('other');
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
        Schema::dropIfExists('disability');
    }
};
