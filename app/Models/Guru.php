<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Guru
 * 
 * @property int $id
 * @property int $user_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property User $user
 * @property Collection|Level[] $levels
 * @property Collection|Jadwal[] $jadwals
 *
 * @package App\Models
 */
class Guru extends Model
{
	protected $table = 'guru';

	protected $casts = [
		'user_id' => 'int'
	];

	protected $fillable = [
		'user_id'
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function levels()
	{
		return $this->belongsToMany(Level::class)
					->withPivot('id')
					->withTimestamps();
	}

	public function jadwals()
	{
		return $this->hasMany(Jadwal::class);
	}
}
