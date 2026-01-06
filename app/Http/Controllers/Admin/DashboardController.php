<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $total_visitors = Visitor::count();

        // Get mobile visitors based on device_type
        $mobile_visitors = Visitor::where('device_type', 'Mobile')->count();

        // Calculate desktop visitors
        $desktop_visitors = Visitor::where('device_type', 'Desktop')->count();

        // Calculate tablet visitors
        $tablet_visitors = Visitor::where('device_type', 'Tablet')->count();

        // Calculate percentage changes (comparing with previous period)
        $previous_total = Visitor::where('created_at', '<', now()->subDays(30))->count();
        $previous_mobile = Visitor::where('device_type', 'Mobile')
            ->where('created_at', '<', now()->subDays(30))
            ->count();
        $previous_desktop = Visitor::where('device_type', 'Desktop')
            ->where('created_at', '<', now()->subDays(30))
            ->count();
        $previous_tablet = Visitor::where('device_type', 'Tablet')
            ->where('created_at', '<', now()->subDays(30))
            ->count();

        $total_change = $previous_total > 0 ? (($total_visitors - $previous_total) / $previous_total) * 100 : 0;
        $mobile_change = $previous_mobile > 0 ? (($mobile_visitors - $previous_mobile) / $previous_mobile) * 100 : 0;
        $desktop_change = $previous_desktop > 0 ? (($desktop_visitors - $previous_desktop) / $previous_desktop) * 100 : 0;
        $tablet_change = $previous_tablet > 0 ? (($tablet_visitors - $previous_tablet) / $previous_tablet) * 100 : 0;

        return view('admin.dashboard', [
            'total_visitors' => $total_visitors,
            'mobile_visitors' => $mobile_visitors,
            'desktop_visitors' => $desktop_visitors,
            'tablet_visitors' => $tablet_visitors,
            'total_change' => round($total_change, 1),
            'mobile_change' => round($mobile_change, 1),
            'desktop_change' => round($desktop_change, 1),
            'tablet_change' => round($tablet_change, 1)
        ]);
    }
}
