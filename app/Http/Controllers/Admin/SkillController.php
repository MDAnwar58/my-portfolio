<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use App\Handlers\File as FileHandler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SkillController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $skills = Skill::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%")
                ->orWhere('url', 'like', "%{$search}%")
                ->orWhere('image_url', 'like', "%{$search}%");
        })->latest()->paginate(10);

        return view('admin.skills.index', compact('skills', 'search'));
    }

    public function create()
    {
        return view('admin.skills.add');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'date_of_exp' => 'nullable|date',
            'url' => 'nullable|url|max:255',
            'image_url' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $validated = $validator->validated();

        // Handle image upload if provided
        if ($request->hasFile('image_url')) {
            $fileHandler = new FileHandler();
            $imagePath = $fileHandler->upload($request->file('image_url'), 'uploads/skill-images', [
                'max_size' => '2M',
                'allowed_types' => ['jpeg', 'png', 'jpg', 'gif', 'svg'],
            ]);

            if ($imagePath) {
                $validated['image_url'] = $fileHandler->getUrl($imagePath);
            } else {
                return redirect()->back()->withErrors(['image_url' => 'Failed to upload image.'])->withInput();
            }
        }

        Skill::create($validated);

        return redirect()->route('admin.skills.index')->with([
            'status' => 'success',
            'msg' => 'Skill created successfully!'
        ]);
    }

    public function edit(Skill $skill)
    {
        return view('admin.skills.edit', compact('skill'));
    }

    public function update(Request $request, Skill $skill)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'date_of_exp' => 'nullable|date',
            'url' => 'nullable|url|max:255',
            'image_url' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $validated = $validator->validated();

        // Handle image upload if provided
        if ($request->hasFile('image_url')) {
            // Delete old image if exists and it's a local file
            if ($skill->image_url) {
                $fileHandler = new FileHandler();
                $fileHandler->delete($skill->image_url);
            }

            $imagePath = $fileHandler->upload($request->file('image_url'), 'uploads/skill-images', [
                'max_size' => '2M',
                'allowed_types' => ['jpeg', 'png', 'jpg', 'gif', 'svg'],
            ]);

            if ($imagePath) {
                $validated['image_url'] = $fileHandler->getUrl($imagePath);
            } else {
                return redirect()->back()->withErrors(['image_url' => 'Failed to upload image.'])->withInput();
            }
        }

        $skill->update($validated);

        return redirect()->route('admin.skills.index')->with([
            'status' => 'success',
            'msg' => 'Skill updated successfully!'
        ]);
    }

    public function destroy(Skill $skill)
    {
        // Delete associated image if it's a local file
        if ($skill->image_url) {
            $fileHandler = new FileHandler();
            $fileHandler->delete($skill->image_url);
        }

        $skill->delete();

        return redirect()->route('admin.skills.index')->with([
            'status' => 'success',
            'msg' => 'Skill deleted successfully!'
        ]);
    }
}
