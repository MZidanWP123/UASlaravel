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
        Schema::create('absensi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('jadwal_id');
            $table->foreign(['jadwal_id'], 'absensi_jadwal_id_foreign')->references(['id'])->on('jadwal');
            $table->unsignedBigInteger('user_id');
            $table->foreign(['user_id'], 'absensi_user_id_foreign')->references(['id'])->on('users');
            $table->timestamp('waktu_checkin');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absensi');
    }
};
