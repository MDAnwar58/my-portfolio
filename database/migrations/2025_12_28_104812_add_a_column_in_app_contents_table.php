<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('app_contents', function (Blueprint $table) {
            $table->enum('working_for', ['available', 'not'])->default('available');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('app_contents', function (Blueprint $table) {
            $table->dropColumn('working_for');
        });
    }
};
