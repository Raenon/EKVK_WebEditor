<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    protected $table = 'users_roles';
    protected $primaryKey = 'user_id';
    protected $fillable = ['user_id', 'role_id'];

    public $timestamps = false;
}
