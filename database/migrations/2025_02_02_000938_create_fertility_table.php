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
        Schema::create('fertility', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('member');
            $table->unsignedBigInteger('household');
            $table->integer('total_males');
            $table->integer('total_females');
            $table->integer('surviving_males');
            $table->integer('surviving_females');
            $table->integer('female_births_last_12months');
            $table->integer('male_births_last_12months');
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
        Schema::dropIfExists('fertility');
    }
};
