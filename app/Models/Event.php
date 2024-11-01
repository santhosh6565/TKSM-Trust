<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'start_date',
        'end_date',
        'image_path',
        'description',
        'view',
        'location',
        'requirements', // JSON formatted
        'event_status'
    ];

    // Cast requirements to array
    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'requirements' => 'array',
    ];

}
