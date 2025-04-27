<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Companies extends Model
{
    /** @use HasFactory<\Database\Factories\CompaniesFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['company_name'];

    public function users(){
        return $this->belongsToMany(Users::class,'users_companies_connection','company_id','user_id');
    }

    public function projects()
    {
        return $this->belongsToMany(Projects::class,'project_company','company_id','project_id');
    }

    public function invites(){
        return $this->belongsToMany(Users::class,'invites','company_id','user_id');
    }

}
