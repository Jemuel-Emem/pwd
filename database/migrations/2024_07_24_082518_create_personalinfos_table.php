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
        Schema::create('personalinfos', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('suffix')->nullable();
            $table->enum('sex', ['Male', 'Female', 'Other']);
            $table->date('date_of_birth');
            $table->integer('age');
            $table->enum('civil_status', ['Single', 'Married', 'Divorced', 'Widowed']);
            $table->string('contact_number');
            $table->string('address');
            $table->string('barangay');
            $table->string('type_of_disability');
            $table->string('cause_of_disability');

            // Guardian Information
            $table->string('g_first_name');
            $table->string('g_middle_name')->nullable();
            $table->string('g_last_name');
            $table->string('g_suffix')->nullable();
            $table->enum('g_sex', ['Male', 'Female', 'Other']);
            $table->date('g_date_of_birth');
            $table->integer('g_age');
            $table->enum('g_civil_status', ['Single', 'Married', 'Divorced', 'Widowed']);
            $table->string('g_contact_number');
            $table->string('g_address');
            $table->string('relationship_with_pwd');


            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personalinfos');
    }
};
