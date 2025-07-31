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
        Schema::table('historias', function (Blueprint $table) {
            $table->string('video_diretorio')->default('');
            $table->string('slide_diretorio')->default('');
            $table->string('ata_diretorio')->default('');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('historias', function (Blueprint $table) {
            //
        });
    }
};
