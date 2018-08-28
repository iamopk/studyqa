<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $remember_token
 */
class User extends Authenticatable
{
    use Notifiable;

    const ROLE_USER = 0;
    const ROLE_ADMIN = 1;
    const ROLE_MODERATOR = 2;
    const ROLE_PUBLISHER = 3;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getRoleName()
    {
        $role = 'user';
        if ($this->role === self::ROLE_ADMIN) {
            $role = 'admin';
        } elseif ($this->role === self::ROLE_PUBLISHER) {
            $role = 'publisher';
        } elseif ($this->role === self::ROLE_MODERATOR) {
            $role = 'moderator';
        }
        return $role;
    }
}
