<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $fillable = [
        'name',
        'date_of_exp',
        'url',
        'image_url',
    ];
    protected $casts = [
        'date_of_exp' => 'datetime', // If using datetime() or timestamp() in migration 'datetime' or If using date() in migration this time use 'date'
        // ... other casts
    ];
}
