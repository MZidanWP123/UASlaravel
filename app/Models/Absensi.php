<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    protected $table = 'absensis';
    use HasFactory;
    protected $filable = [
        'id_guru',
        'id_kelas',
        'id_level',
        'id_jadwal',
        'waktu_absen',
    ];

    public function guru(){
        return $this->belongsTo(Guru::class, 'id_guru');
    }

    public function level(){
        return $this->belongsTo(Level::class, 'id_class');
    }

    public function jadwal(){
        return $this->belongsTo(Jadwal::class, 'id_jadwal');
    }

    public function kelas(){
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }
}
