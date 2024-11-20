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
        Schema::create('healths', function (Blueprint $table) {
            $table->id();
            $table->string('blood_pressure')->nullable();
            $table->string('blood_type')->nullable();
            $table->string('weight')->nullable();
            $table->string('height')->nullable();
            $table->string('respiratory_rate')->nullable();
            $table->string('pulse_rate')->nullable();
            $table->string('o2_stat')->nullable();
            $table->string('temperature')->nullable();
            $table->text('other_conditions')->nullable();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('healths');
    }
};
