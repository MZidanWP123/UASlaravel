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
        Schema::create('jadwal', function (Blueprint $table) {
            $table->id();
            $table->string("hari");
            $table->unsignedBigInteger('kelas_id');
            $table->foreign(['kelas_id'], 'jadwal_kelas_id_foreign')->references(['id'])->on('kelas');
            $table->unsignedBigInteger('level_id');
            $table->foreign(['level_id'], 'jadwal_level_id_foreign')->references(['id'])->on('level');
            $table->unsignedBigInteger('guru_id');
            $table->foreign(['guru_id'], 'jadwal_guru_id_foreign')->references(['id'])->on('guru');
            $table->time('jam_mulai');
            $table->time('jam_selesai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal');
    }
};
