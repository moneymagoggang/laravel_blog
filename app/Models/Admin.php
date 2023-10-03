<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 */
class Admin extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * @var string[] $fillable
     */
    protected $fillable = [
        'id', 'name', 'email', 'password',
    ];

    /**
     * @var string[] $hidden
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
