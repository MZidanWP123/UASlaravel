<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Murid extends Model
{
    use HasFactory;

    protected $table = "murids";

    protected $fillable = [
        "nama_murid",
        'id_level'
    ];

    public function level(){
        return $this->belongsTo(Level::class, 'id_level');
    }
}
