<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuruLevel extends Model
{
    use HasFactory;

    protected $table = 'guru_levels';

    protected $fillable = [
        'id_guru',
        'id_level'
    ];

    public $timestamps = true;

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'id_guru');
    }

    public function level()
    {
        return $this->belongsTo(Level::class, 'id_level');
    }
}
