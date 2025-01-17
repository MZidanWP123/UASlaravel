<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    protected $table = 'kelas';
    protected $fillable = [
        //'id_kelas',
        'nama_kelas'
    ];

    public function guru(){
        return $this->hasMany(Guru::class, 'id_kelas');
    }
}
