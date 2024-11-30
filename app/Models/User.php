<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User
 * 
 * @property int $id
 * @property string $name
 * @property string $email
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Guru[] $gurus
 * @property Collection|Murid[] $murids
 * @property Collection|Absensi[] $absensis
 *
 * @package App\Models
 */
class User  extends Authenticatable
{
	protected $table = 'users';

	protected $casts = [
		'email_verified_at' => 'datetime'
	];

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'name',
		'username',
		'email',
		'email_verified_at',
		'password',
		'remember_token'
	];

	public function gurus()
	{
		return $this->hasMany(Guru::class);
	}

	public function murids()
	{
		return $this->hasMany(Murid::class);
	}

	public function absensis()
	{
		return $this->hasMany(Absensi::class);
	}
}
