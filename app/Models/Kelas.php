<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Kela
 * 
 * @property int $id
 * @property string $nama_kelas
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Jadwal[] $jadwals
 *
 * @package App\Models
 */
class Kela extends Model
{
	protected $table = 'kelas';

	protected $fillable = [
		'nama_kelas'
	];

	public function jadwals()
	{
		return $this->hasMany(Jadwal::class, 'kelas_id');
	}
}
