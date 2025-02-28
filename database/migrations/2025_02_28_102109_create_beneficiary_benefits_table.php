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
        Schema::create('beneficiary_benefits', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('beneficiary_id');
            $table->unsignedBigInteger('benefit_id');
            $table->timestamps();

            $table->foreign('beneficiary_id')->references('id')->on('benefeciaries')->onDelete('cascade');
            $table->foreign('benefit_id')->references('id')->on('benefits')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beneficiary_benefits');
    }
};
