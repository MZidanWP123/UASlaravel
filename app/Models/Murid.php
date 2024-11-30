<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Murid
 * 
 * @property int $id
 * @property int $user_id
 * @property int $level_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property User $user
 * @property Level $level
 * @property Collection|Jadwal[] $jadwals
 *
 * @package App\Models
 */
class Murid extends Model
{
	protected $table = 'murid';

	protected $casts = [
		'user_id' => 'int',
		'level_id' => 'int'
	];

	protected $fillable = [
		'user_id',
		'level_id'
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function level()
	{
		return $this->belongsTo(Level::class);
	}

	public function jadwals()
	{
		return $this->belongsToMany(Jadwal::class)
					->withPivot('id')
					->withTimestamps();
	}
}
