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
        Schema::table('user_meta_data', function (Blueprint $table) {
              $table->string('primary_color')->nullable();
              $table->string('secondary_color')->nullable();
              $table->string('seal')->nullable();
              $table->string('logo')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_meta_data', function (Blueprint $table) {
              $table->string('primary_color')->nullable();
              $table->string('secondary_color')->nullable();
              $table->string('seal')->nullable();
              $table->string('logo')->nullable();
        });
    }
};
