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
        Schema::create('individual_entity_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('applicant_id')->constrained('individual_entities')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('expiration_id')->constrained('certificate_expirations')->onUpdate('cascade');
            $table->string('status')->default('Valid');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('individual_entity_requests');
    }
};
