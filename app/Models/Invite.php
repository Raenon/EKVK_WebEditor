<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invite extends Model
{
    /** @use HasFactory<\Database\Factories\InviteFactory> */
    use HasFactory;

    protected $table = 'invites';
    protected $primaryKey = 'id';
    protected $fillable = ["company_id", "user_id", 'accepted'];
}
