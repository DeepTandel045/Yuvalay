<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuccessStory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'role',
        'organization',
        'story_quote',
        'full_story',
        'program_name',
        'avatar_url',
        'is_featured',
        'order_index',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
    ];
}
