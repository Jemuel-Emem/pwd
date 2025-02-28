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
        Schema::create('benefeciaries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('suffix')->nullable();
            $table->enum('sex', ['male', 'female', 'other']);
            $table->date('date_of_birth');
            $table->integer('age');
            $table->string('civil_status');
            $table->string('contact_number');
            $table->string('address');
            $table->string('barangay');
            $table->string('type_of_disability')->nullable();
            $table->string('cause_of_disability')->nullable();
            $table->enum('applicantstatus', ['pending', 'approved', 'declined'])->default('pending');
            $table->timestamps();

            // Foreign Key
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('benefeciaries');
    }
};
