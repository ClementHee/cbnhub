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
        Schema::create('section_materials', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_section_id')->constrained()->onDelete('cascade');
            $table->string('upload_type');
            $table->string('brightcove_url')->nullable();
            $table->integer('order')->nullable();
            $table->string('video_title')->nullable();
            $table->string('filepath')->nullable();
            $table->string('file_name')->nullable();
            $table->string('file_category')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('section_materials');
    }
};
