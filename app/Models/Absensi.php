<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Absensi
 * 
 * @property int $id
 * @property int $jadwal_id
 * @property int $user_id
 * @property Carbon $waktu_checkin
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Jadwal $jadwal
 * @property User $user
 *
 * @package App\Models
 */
class Absensi extends Model
{
	protected $table = 'absensi';

	protected $casts = [
		'jadwal_id' => 'int',
		'user_id' => 'int',
		'waktu_checkin' => 'datetime'
	];

	protected $fillable = [
		'jadwal_id',
		'user_id',
		'waktu_checkin'
	];

	public function jadwal()
	{
		return $this->belongsTo(Jadwal::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
