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
        Schema::create('organizations', function (Blueprint $table) {
            $table->id();
            $table->string('synod_id')->nullable(); // Optional logo URL for the organization
            $table->string('org_type')->nullable();
            $table->string('leadership')->nullable(); // Unique name for the organization
            $table->string('leadership_email')->nullable(); // Unique name for the organization
            $table->string('address')->nullable(); // Unique name for the organization
            $table->string('city')->nullable(); // Unique name for the organization
            $table->foreignId('city_id')->nullable()->constrained('city')->cascadeOnDelete(); // Foreign key to states table
            $table->foreignId('province_id')->nullable()->constrained('province')->cascadeOnDelete();
            $table->foreignId('district_id')->nullable()->constrained('district')->cascadeOnDelete();    
            $table->string('neighborhood_id')->nullable(); 
            $table->string('postal')->nullable(); // Postal code for the organization
            $table->string('phone')->nullable(); // Phone number for the organization
            $table->string('phone_alt')->nullable(); 
            $table->string('website_url')->nullable(); // Website URL for the organization
            $table->string('code'); // Unique code for the organization
            $table->string('rayon_id')->nullable(); // Rayon ID for the organization
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organizations');
    }
};
