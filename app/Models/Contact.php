<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    // Define the fillable fields to allow mass assignment
    protected $fillable = [
        'name',
        'email',
        'message',
    ];
}