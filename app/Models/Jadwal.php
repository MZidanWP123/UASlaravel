<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;
    protected $fillable = [
        'jam_masuk',
        'jam_keluar'
    ];

    public function absensi(){
        return $this->hasOne(Absensi::class, 'id_jadwal');
    }
}
