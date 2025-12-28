<?php

namespace App\Http\Controllers;

use App\Models\AppContent;
use App\Models\Skill;
use App\Models\SocialMedia;
use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $appContent = AppContent::first();
        $skills = Skill::oldest()->get();
        $works = Work::latest()->get();
        $social_medias = SocialMedia::oldest()->get();

        return view('welcome', compact('appContent', 'skills', 'works', 'social_medias'));
    }
}
