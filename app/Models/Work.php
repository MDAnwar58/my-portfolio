<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    protected $fillable = [
        'name',
        'short_desc',
        'type',
        'live_demo_link',
        'github_link',
        'more_info',
        'image',
    ];
}
