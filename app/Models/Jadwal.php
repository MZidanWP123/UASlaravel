<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Jadwal
 * 
 * @property int $id
 * @property string $hari
 * @property int $kelas_id
 * @property int $level_id
 * @property int $guru_id
 * @property time without time zone $jam_mulai
 * @property time without time zone $jam_selesai
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Kela $kela
 * @property Level $level
 * @property Guru $guru
 * @property Collection|Murid[] $murids
 * @property Collection|Absensi[] $absensis
 *
 * @package App\Models
 */
class Jadwal extends Model
{
	protected $table = 'jadwal';

	protected $casts = [
		'kelas_id' => 'int',
		'level_id' => 'int',
		'guru_id' => 'int',
		'jam_mulai' => 'string',
		'jam_selesai' => 'string'
	];

	protected $fillable = [
		'hari',
		'kelas_id',
		'level_id',
		'guru_id',
		'jam_mulai',
		'jam_selesai'
	];

	public function kelas()
	{
		return $this->belongsTo(Kelas::class, 'kelas_id');
	}

	public function level()
	{
		return $this->belongsTo(Level::class);
	}

	public function guru()
	{
		return $this->belongsTo(Guru::class);
	}

	public function murids()
	{
		return $this->belongsToMany(Murid::class)
					->withPivot('id')
					->withTimestamps();
	}

	public function absensis()
	{
		return $this->hasMany(Absensi::class);
	}
}
