<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Level
 * 
 * @property int $id
 * @property string $nama_level
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Murid[] $murids
 * @property Collection|Guru[] $gurus
 * @property Collection|Jadwal[] $jadwals
 *
 * @package App\Models
 */
class Level extends Model
{
	protected $table = 'level';

	protected $fillable = [
		'nama_level'
	];

	public function murids()
	{
		return $this->hasMany(Murid::class);
	}

	public function gurus()
	{
		return $this->belongsToMany(Guru::class)
					->withPivot('id')
					->withTimestamps();
	}

	public function jadwals()
	{
		return $this->hasMany(Jadwal::class);
	}
}
