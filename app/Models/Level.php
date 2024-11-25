<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;

    protected $table = 'levels';

    protected $fillable = [
        "nama_level"
    ];

    public function guru(){
        return $this->belongsToMany(Guru::class, 'guru_level', 'id_level', 'id_guru');
    }

    public function murid(){
        return $this->hasMany(Murid::class, 'id_level');
    }
}
