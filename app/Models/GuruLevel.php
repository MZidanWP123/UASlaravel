<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class GuruLevel
 * 
 * @property int $id
 * @property int $guru_id
 * @property int $level_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Guru $guru
 * @property Level $level
 *
 * @package App\Models
 */
class GuruLevel extends Model
{
	protected $table = 'guru_level';

	protected $casts = [
		'guru_id' => 'int',
		'level_id' => 'int'
	];

	protected $fillable = [
		'guru_id',
		'level_id'
	];

	public function guru()
	{
		return $this->belongsTo(Guru::class);
	}

	public function level()
	{
		return $this->belongsTo(Level::class);
	}
}
