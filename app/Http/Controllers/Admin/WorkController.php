<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Work;
use App\Handlers\File as FileHandler;
use Illuminate\Http\Request;

class WorkController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $works = Work::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%")
                ->orWhere('short_desc', 'like', "%{$search}%")
                ->orWhere('type', 'like', "%{$search}%");
        })->latest()->paginate(5);

        return view('admin.works.index', compact('works', 'search'));
    }

    public function create()
    {
        return view('admin.works.add');
    }

    public function edit(Work $work)
    {
        return view('admin.works.edit', compact('work'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'short_desc' => 'required|string|max:500',
            'type' => 'required|in:web app,mobile app,desktop app,ui/ux design,other',
            'live_demo_link' => 'nullable|url|max:255',
            'github_link' => 'required|url|max:255',
            'more_info' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:20480',
        ]);

        // Handle image upload if provided
        if ($request->hasFile('image')) {
            $fileHandler = new FileHandler();
            $imagePath = $fileHandler->upload($request->file('image'), 'uploads/work-images', [
                'max_size' => '2M',
                'allowed_types' => ['jpeg', 'png', 'jpg', 'gif', 'svg'],
            ]);

            if ($imagePath) {
                $validated['image'] = $fileHandler->getUrl($imagePath);
            } else {
                return redirect()->back()->withErrors(['image' => 'Failed to upload image.'])->withInput();
            }
        }

        Work::create($validated);

        return redirect()->route('admin.works.index')->with([
            'status' => 'success',
            'msg' => 'Work created successfully!'
        ]);
    }

    public function update(Request $request, Work $work)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'short_desc' => 'required|string|max:500',
            'type' => 'required|in:web app,mobile app,desktop app,ui/ux design,other',
            'live_demo_link' => 'nullable|url|max:255',
            'github_link' => 'required|url|max:255',
            'more_info' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:20480',
        ]);

        // Handle image upload if provided
        if ($request->hasFile('image')) {
            // Delete old image if exists
            $fileHandler = new FileHandler();
            return true;
            if ($work->image) {
                $fileHandler->delete($work->image);
            }

            $imagePath = $fileHandler->upload($request->file('image'), 'uploads/work-images', [
                'max_size' => '2M',
                'allowed_types' => ['jpeg', 'png', 'jpg', 'gif', 'svg'],
            ]);

            if ($imagePath) {
                $validated['image'] = $fileHandler->getUrl($imagePath);
            } else {
                return redirect()->back()->withErrors(['image' => 'Failed to upload image.'])->withInput();
            }
        }

        $work->update($validated);

        return redirect()->route('admin.works.index')->with([
            'status' => 'success',
            'msg' => $work->name . ' updated successfully!'
        ]);
    }

    public function destroy(Work $work)
    {
        // Delete associated image if exists
        if ($work->image) {
            $fileHandler = new FileHandler();
            $fileHandler->delete($work->image);
        }

        $work->delete();

        return redirect()->route('admin.works.index')->with([
            'status' => 'success',
            'msg' => 'Work deleted successfully!'
        ]);
    }
}