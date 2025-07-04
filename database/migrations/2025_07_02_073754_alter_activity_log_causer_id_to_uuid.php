<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('activity_log', function (Blueprint $table) {
            // Drop the existing integer column
            $table->dropColumn('causer_id');
            $table->dropColumn('subject_id');

        });

        Schema::table('activity_log', function (Blueprint $table) {
            // Re-create as UUID
            $table->uuid('causer_id')->nullable()->index();
            $table->uuid('subject_id')->nullable()->index();
        });
    }

    public function down(): void
    {
        Schema::table('activity_log', function (Blueprint $table) {
            // Drop the UUID column
            $table->dropColumn('causer_id');
            $table->dropColumn('subject_id');
        });

        Schema::table('activity_log', function (Blueprint $table) {
            // Re-create as unsignedBigInteger
            $table->unsignedBigInteger('causer_id')->nullable()->index();
            $table->unsignedBigInteger('subject_id')->nullable()->index();
        });
    }
};

