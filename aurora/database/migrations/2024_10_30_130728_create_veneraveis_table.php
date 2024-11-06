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
        Schema::create('veneraveis', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->year('ano_inicio');
            $table->year('ano_final');
            $table->string('diretorio');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('veneraveis');
    }
};
