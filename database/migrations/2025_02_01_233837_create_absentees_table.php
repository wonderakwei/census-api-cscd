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
        Schema::create('absentees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('household');
            $table->string('name');
            $table->string('relationship_to_head');
            $table->string('status');
            $table->integer('age');
            $table->string('destination');
            $table->integer('months_absent');
            $table->string('sex');
            $table->foreign('household')->references('id')->on('households');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absentees');
    }
};
