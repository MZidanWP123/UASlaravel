<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class JadwalMurid
 * 
 * @property int $id
 * @property int $jadwal_id
 * @property int $murid_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Jadwal $jadwal
 * @property Murid $murid
 *
 * @package App\Models
 */
class JadwalMurid extends Model
{
	protected $table = 'jadwal_murid';

	protected $casts = [
		'jadwal_id' => 'int',
		'murid_id' => 'int'
	];

	protected $fillable = [
		'jadwal_id',
		'murid_id'
	];

	public function jadwal()
	{
		return $this->belongsTo(Jadwal::class);
	}

	public function murid()
	{
		return $this->belongsTo(Murid::class);
	}
}
