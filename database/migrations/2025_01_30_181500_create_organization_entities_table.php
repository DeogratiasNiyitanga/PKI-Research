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
        Schema::create('organization_entities', function (Blueprint $table) {
            $table->id();
            $table->string('organization_name');
            $table->string('tin')->unique();
            $table->string('short_name');
            $table->string('md_ceo_name');
            $table->string('organization_address');
            $table->string('status')->default('Active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organization_entities');
    }
};
