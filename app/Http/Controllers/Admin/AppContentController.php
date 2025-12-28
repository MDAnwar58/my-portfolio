<?php

namespace App\Http\Controllers\Admin;

use App\Handlers\File;
use App\Http\Controllers\Controller;
use App\Models\AppContent;
use Illuminate\Http\Request;

class AppContentController extends Controller
{
    public function index()
    {
        $appContent = AppContent::first();

        return view('admin.app-content', compact('appContent'));
    }

    public function store_or_update(Request $request)
    {
        $request->validate([
            'hero_f_title' => 'required|string|max:255',
            'hero_m_title' => 'required|string|max:255',
            'hero_l_title' => 'required|string|max:255',
            'hero_short_desc' => 'required|string',
            'projects_count' => 'required|integer',
            'exp_duration' => 'required|string|max:255',
            'happy_client' => 'required|integer',
            'feature_1' => 'required|string|max:255',
            'feature_2' => 'required|string|max:255',
            'feature_3' => 'required|string|max:255',
            'feature_4' => 'required|string|max:255',
            'view_w_title' => 'required|string|max:255',
            'view_w_short_desc' => 'required|string',
            'view_s_title' => 'required|string|max:255',
            'view_s_short_desc' => 'required|string',
            'c_title' => 'required|string|max:255',
            'c_short_desc' => 'required|string',
            'working_for' => 'required|in:available,not',
            'p_avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:20480',
        ]);

        $appContent = AppContent::first();
        $requestData = $request->except('p_avatar'); // Exclude the avatar from the request data initially

        // Handle p_avatar upload if present
        if ($request->hasFile('p_avatar')) {
            $fileHandler = new File();

            // Delete the old avatar file if it exists
            if ($appContent && $appContent->p_avatar) {
                $fileHandler->delete($appContent->p_avatar);
            }

            $filePath = $fileHandler->upload(
                $request->file('p_avatar'),
                'uploads/images',
                [
                    'max_size' => '20M',
                    'allowed_types' => ['jpeg', 'jpg', 'png', 'gif'],
                    'preserve_name' => false
                ]
            );

            if ($filePath) {
                // Create the full URL for the image
                $requestData['p_avatar'] = asset($filePath);
            }
        }

        if ($appContent) {
            $appContent->update($requestData);
            $message = 'App content updated successfully!';
        } else {
            AppContent::create($requestData);
            $message = 'App content created successfully!';
        }

        // dd($appContent->c_title);
        return redirect()->route('admin.app-content.index')->with([
            'status' => 'success',
            'msg' => $message
        ]);
    }
}
