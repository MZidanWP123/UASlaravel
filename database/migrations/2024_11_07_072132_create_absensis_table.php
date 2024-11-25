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
        Schema::create('absensis', function (Blueprint $table) {
            $table->id();
            //$table->foreignId('id_guru')->constrained('gurus', 'id_guru')->onDelete('cascade');
            //$table->foreignId('id_kelas')->constrained('kelas', 'id_kelas')->onDelete('cascade');
            $table->foreignId('id_level')->constrained('levels')->onDelete('cascade');
            $table->foreignId('id_jadwal')->constrained('jadwals')->onDelete('cascade');
            // Jika Anda perlu menyimpan jam absen
            $table->timestamp('jam_absen')->nullable(); // Sesuaikan jika ingin menyimpan waktu
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absensis');
    }
};
