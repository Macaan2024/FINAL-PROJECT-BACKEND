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
        Schema::create('rawgrades', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('subject_id')->constrained('subjects')->onDelete('cascade');
            $table->foreignId('enrollment_id')->constrained('enrollments')->onDelete('cascade');
            $table->foreignId('period_id')->constrained('periods')->onDelete('cascade');
            $table->string('type');
            $table->integer('score');
            $table->string('attendance');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rawgrades');
        // Schema::dropIfExists('users');
        // Schema::dropIfExists('subjects');
        // Schema::dropIfExists('enrollments');
        // Schema::dropIfExists('periods');
    }
};
