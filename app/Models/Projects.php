<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Projects extends Model
{
    /** @use HasFactory<\Database\Factories\ProjectsFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ["project_name", "project_description", "project_data"];

    public function companies()
    {
        return $this->belongsToMany(Companies::class,'project_company','project_id','company_id');
    }


}

