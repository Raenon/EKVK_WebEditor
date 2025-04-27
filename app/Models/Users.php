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

    protected $fillable = ["username", "email", "password"];
    protected $hidden = ["password"];

    public function roles()
    {
        return $this->belongsToMany(Role::class,'users_roles','user_id','role_id');
    }

    public function companies(){
        return $this->belongsToMany(Companies::class,'users_companies_connection','user_id','company_id');
    }

    public function hasRole($role){
        return $this->roles->contains('id',$role);
    }
}
