<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Users extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UsersFactory> */
    use HasFactory;
    use Notifiable;
    use SoftDeletes;

    protected $fillable = ["username", "email", "password", "role"];
    protected $hidden = ["password"];
}
