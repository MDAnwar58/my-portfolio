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
        Schema::create('app_contents', function (Blueprint $table) {
            $table->id();
            $table->string('hero_f_title')->nullable();
            $table->string('hero_m_title')->nullable();
            $table->string('hero_l_title')->nullable();
            $table->text('hero_short_desc')->nullable();
            $table->integer('projects_count')->default(0);
            $table->string('exp_duration')->nullable();
            $table->integer('happy_client')->default(0);
            $table->string('feature_1')->nullable();
            $table->string('feature_2')->nullable();
            $table->string('feature_3')->nullable();
            $table->string('feature_4')->nullable();
            $table->string('view_w_title')->nullable();
            $table->text('view_w_short_desc')->nullable();
            $table->string('view_s_title')->nullable();
            $table->text('view_s_short_desc')->nullable();
            $table->string('c_title')->nullable();
            $table->text('c_short_desc')->nullable();
            $table->string('p_avatar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('app_contents');
    }
};
