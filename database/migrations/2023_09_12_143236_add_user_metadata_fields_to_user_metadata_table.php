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
            $table->string('cep', 10)->nullable();
            $table->string('logradouro')->nullable();
            $table->string('complemento')->nullable();
            $table->string('bairro')->nullable();
            $table->string('localidade')->nullable();
            $table->string('uf', 2)->nullable();
            $table->string('ddd', 2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_meta_data', function (Blueprint $table) {
            $table->dropColumn('cep');
            $table->dropColumn('logradouro');
            $table->dropColumn('complemento');
            $table->dropColumn('bairro');
            $table->dropColumn('localidade');
            $table->dropColumn('uf');
            $table->dropColumn('ddd');
        });
    }
};
