<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class AdminOP extends Authenticatable  implements JWTSubject
{
	use Notifiable;
	public $table = "tb_admop";

    protected $fillable = [
		'id_user', 'name', 'email', 'password', 'foto', 'role', 'remember_token'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
	public function getJWTIdentifier()
    {
        return $this->getKey();
    }
	public function getJWTCustomClaims()
    {
        return [];
    }
}