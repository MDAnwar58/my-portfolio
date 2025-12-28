<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SocialMedia;
use App\Handlers\File as FileHandler;
use Illuminate\Http\Request;

class SocialMediaController extends Controller
{
    public function index()
    {
        $search = request()->get('search');

        $socialMedia = SocialMedia::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%")
                ->orWhere('url', 'like', "%{$search}%");
        })->latest()->paginate(5);

        return view('admin.social-media.index', compact('socialMedia', 'search'));
    }

    public function create()
    {
        return view('admin.social-media.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'icon_cdn' => 'nullable|string|max:2000',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'url' => 'required|url|max:255',
        ]);

        // Handle icon upload if provided
        if ($request->hasFile('icon')) {
            $fileHandler = new FileHandler();
            $iconPath = $fileHandler->upload($request->file('icon'), 'uploads/social-media-icons', [
                'max_size' => '2M',
                'allowed_types' => ['jpeg', 'png', 'jpg', 'gif', 'svg'],
            ]);

            if ($iconPath) {
                $validated['icon'] = $fileHandler->getUrl($iconPath);
            } else {
                return redirect()->back()->withErrors(['icon' => 'Failed to upload icon.'])->withInput();
            }
        } else {
            // If no file uploaded, remove icon from validated data to avoid storing null
            unset($validated['icon']);
        }

        SocialMedia::create($validated);

        return redirect()->route('admin.social-media.index')->with([
            'status' => 'success',
            'msg' => 'Social media added!'
        ]);
    }

    public function edit($id)
    {
        $socialMedium = SocialMedia::findOrFail(intval($id));
        return view('admin.social-media.edit', compact('socialMedium'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'icon_cdn' => 'nullable|string|max:255',
            'svg_path' => 'nullable|string|max:2000',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'url' => 'required|url|max:255',
        ]);

        $socialMedium = SocialMedia::findOrFail(intval($id));

        // Handle icon upload if provided
        if ($request->hasFile('icon')) {
            // Delete old icon if exists and it's a local file
            if ($socialMedium->icon) {
                $fileHandler = new FileHandler();
                $fileHandler->delete($socialMedium->icon);
            }

            $fileHandler = new FileHandler();
            $iconPath = $fileHandler->upload($request->file('icon'), 'uploads/social-media-icons', [
                'max_size' => '2M',
                'allowed_types' => ['jpeg', 'png', 'jpg', 'gif', 'svg'],
            ]);

            if ($iconPath) {
                $validated['icon'] = $fileHandler->getUrl($iconPath);
            } else {
                return redirect()->back()->withErrors(['icon' => 'Failed to upload icon.'])->withInput();
            }
        } else {
            // If no file uploaded, keep the old icon or remove from validated data
            unset($validated['icon']);
        }

        if ($request->input('icon_cdn') || $request->input('svg_path')) {
            if ($socialMedium->icon) {
                $fileHandler = new FileHandler();
                $fileHandler->delete($socialMedium->icon);
            }
            $validated['icon'] = '';
            if ($request->input('svg_path'))
                $validated['icon_cdn'] = '';
            else
                $validated['svg_path'] = '';
        }

        $socialMedium->update($validated);

        return redirect()->route('admin.social-media.index')->with([
            'status' => 'success',
            'msg' => 'Social media updated!'
        ]);
    }

    public function destroy($id)
    {
        $socialMedium = SocialMedia::findOrFail(intval($id));
        if ($socialMedium->icon) {
            $fileHandler = new FileHandler();
            $fileHandler->delete($socialMedium->icon);
        }

        $socialMedium->delete();

        return redirect()->route('admin.social-media.index')->with([
            'status' => 'success',
            'msg' => 'Social media deleted successfully!'
        ]);
    }
}