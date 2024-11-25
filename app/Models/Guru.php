<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    protected $table = 'gurus';
    
    protected $fillable = [
        'nama',
        'username',
        'passwrord',
        'id_kelas'
    ];

    protected $hidden = [
        'password'
    ];

    public function level(){
        return $this->belongsToMany(level::class, 'guru_level', 'id_guru', 'id_level');
    }

    public function kelas(){
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }

    public function absensi(){
        return $this->hasMany(Absensi::class, 'id_guru');
    }
}
