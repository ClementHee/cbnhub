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
        Schema::create('journals', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('user_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('church_name');
            $table->foreignId('season')->constrained('seasons')->onDelete('cascade');
            $table->string('bible_story');
            $table->string('lesson');
            $table->string('difficulty');
            $table->string('interest');
            $table->string('no_child');
            $table->string('no_salvation')->nullable();
            $table->string('improvement')->nullable();
            $table->string('feedback')->nullable();
            $table->string('testimony');
            $table->string('pictures')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('journals');
    }
};
