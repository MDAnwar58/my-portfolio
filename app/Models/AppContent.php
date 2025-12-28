<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppContent extends Model
{
    protected $fillable = [
        'hero_f_title',
        'hero_m_title',
        'hero_l_title',
        'hero_short_desc',
        'projects_count',
        'exp_duration',
        'happy_client',
        'feature_1',
        'feature_2',
        'feature_3',
        'feature_4',
        'view_w_title',
        'view_w_short_desc',
        'view_s_title',
        'view_s_short_desc',
        'c_title',
        'c_short_desc',
        'p_avatar',
        'working_for',
    ];
}
