<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'title',
        'category',
        'date_str',
        'time_str',
        'mode',
        'location',
        'speaker_name',
        'speaker_role',
        'speaker_avatar',
        'short_desc',
        'full_desc',
        'seats_total',
        'seats_booked',
        'is_upcoming',
        'registration_open',
    ];

    protected $casts = [
        'is_upcoming' => 'boolean',
        'registration_open' => 'boolean',
        'seats_total' => 'integer',
        'seats_booked' => 'integer',
    ];

    public function registrations()
    {
        return $this->hasMany(EventRegistration::class);
    }

    public function getSeatsRemainingAttribute()
    {
        return max(0, $this->seats_total - $this->seats_booked);
    }

    public function getFormattedDateAttribute()
    {
        $time = strtotime($this->date_str);
        if ($time !== false && $time > 0) {
            return date('d M Y', $time);
        }
        return $this->date_str;
    }
}
