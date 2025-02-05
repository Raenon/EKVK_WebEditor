<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Users extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UsersFactory> */
    use HasFactory;
    use Notifiable;
    protected $fillable = ["username", "email", "password", "userType"];
    protected $hidden = ["password"];
}
