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
        Schema::create('jadwal_murid', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('jadwal_id');
            $table->foreign(['jadwal_id'], 'jadwal_murid_jadwal_id_foreign')->references(['id'])->on('jadwal');
            $table->unsignedBigInteger('murid_id');
            $table->foreign(['murid_id'], 'jadwal_murid_murid_id_foreign')->references(['id'])->on('murid');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_murid');
    }
};
