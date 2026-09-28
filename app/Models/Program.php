<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'title',
        'category',
        'short_desc',
        'full_desc',
        'duration',
        'target_audience',
        'outcomes',
        'features',
        'image_url',
        'is_featured',
        'order_index',
    ];

    protected $casts = [
        'outcomes' => 'array',
        'features' => 'array',
        'is_featured' => 'boolean',
    ];
}
