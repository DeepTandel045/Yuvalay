<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mentor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'role',
        'organization',
        'expertise',
        'bio',
        'avatar_url',
        'linkedin_url',
        'category',
        'order_index',
    ];
}
