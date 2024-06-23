<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, HasApiTokens, Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'user_id';
    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'gender_id',
        'role_id',
        'address',
        'birth_date',
        'email_address',
        'username',
        'password',
        'isDeleted'
    ];
    protected $hidden = [ 'password' ];
}
