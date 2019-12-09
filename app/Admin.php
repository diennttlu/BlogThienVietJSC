<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';

    protected $guard = 'admin';

    protected $fillable = [
        'full_name',
        'email',
        'password',
        'point',
        'location',
        'image',
        'email_public',
        'description',
        'role',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
