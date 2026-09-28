<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImpactStat extends Model
{
    use HasFactory;

    protected $fillable = [
        'key_name',
        'label',
        'value',
        'description',
        'icon_name',
        'order_index',
    ];
}
