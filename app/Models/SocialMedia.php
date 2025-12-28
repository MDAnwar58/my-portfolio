<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialMedia extends Model
{
    protected $fillable = [
        'name',
        'icon_cdn',
        'svg_path',
        'icon',
        'url',
    ];
}
