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
        Schema::create('guru_level', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('guru_id');
            $table->foreign(['guru_id'], 'guru_level_guru_id_foreign')->references(['id'])->on('guru');
            $table->unsignedBigInteger('level_id');
            $table->foreign(['level_id'], 'guru_level_level_id_foreign')->references(['id'])->on('level');
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
