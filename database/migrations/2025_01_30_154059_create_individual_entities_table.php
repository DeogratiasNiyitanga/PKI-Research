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
        Schema::create('individual_entities', function (Blueprint $table) {
            $table->id();
            $table->string('applicant_name');
            $table->string('national_id')->unique();
            $table->string('address');
            $table->string('mobile_number');
            $table->string('email')->unique();
            $table->string('status')->default('Active');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('individual_entities');
    }
};
