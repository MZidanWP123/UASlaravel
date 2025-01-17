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
        Schema::create('guru_levels', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_guru')->constrained('gurus')->onDelete('cascade');
            $table->foreignId('id_level')->constrained('levels')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guru_levels');
    }
};
