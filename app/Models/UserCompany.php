<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserCompany extends Model
{
    protected $table = 'users_companies_connection';
    protected $primaryKey = 'user_id';
    protected $fillable = ['user_id', 'company_id', 'company_admin'];
    public $timestamps = false;
}
