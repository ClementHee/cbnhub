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
        {Schema::create('province', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->timestamps();
        });

        Schema::create('city', function (Blueprint $table) {
            $table->id();
            $table->foreignId('province_id')->constrained('province')->onDelete('cascade');
            $table->string('name');
            $table->string('city_code')->nullable();
            $table->string('cnarea')->nullable();
            $table->timestamps();
        });

        Schema::create('district', function (Blueprint $table) {
            $table->id();
            $table->foreignId('regency_id')->constrained('city')->onDelete('cascade');
            $table->string('name');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {Schema::dropIfExists('district');
       
        Schema::dropIfExists('city');
        
         Schema::dropIfExists('province');
    }
};
