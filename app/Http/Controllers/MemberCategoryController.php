<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MemberCategory;
use Illuminate\Support\Facades\File;

class MemberCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("dashboard.pages.memberCategories.index", [
            'title' => 'Member Categories',
            'memberCategories' => MemberCategory::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("dashboard.pages.memberCategories.create", [
            'title' => 'Member Categories',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|min:3|max:255',
            'period' => 'required|string',
            'description' => 'required|string',
            'background' => 'image|mimes:jpeg,png,jpg|max:5120',
        ]);

        $backgroundPath = null;
        if ($request->hasFile('background')) {
            $background = $request->file('background');
            $backgroundName = time() . '_' . $background->getClientOriginalName();
            $background->move(public_path('assets/images'), $backgroundName);
            $backgroundPath = 'assets/images/' . $backgroundName;
        } else {
            $backgroundPath = 'assets/images/No_Image_Available.png';
        }


        MemberCategory::create([
            'title' => $request->title,
            'period' => $request->period,
            'description' => $request->description,
            'background' => $backgroundPath,
        ]);

        return redirect()->route('member-categories.index')->with('success', 'Member category created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(MemberCategory $memberCategory)
    {
        $memberCategory->load('members');

        return view("dashboard.pages.memberCategories.show", [
            'title' => 'Member Categories',
            'memberCategory' => $memberCategory
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MemberCategory $memberCategory)
    {
        return view("dashboard.pages.memberCategories.edit", [
            'title' => 'Member Categories',
            'memberCategory' => $memberCategory
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MemberCategory $memberCategory)
    {
        $request->validate([
            'title' => 'required|string|min:3|max:255',
            'period' => 'required|string',
            'description' => 'required|string',
            'background' => 'image|mimes:jpeg,png,jpg|max:5120',
        ]);

        $backgroundPath = $memberCategory->background;

        if ($request->hasFile('background')) {
            // Delete old background if exists
            if ($backgroundPath) {
                if (file_exists(public_path($backgroundPath))) {
                    unlink(public_path($backgroundPath));
                }
            }

            $background = $request->file('background');
            $backgroundName = time() . '_' . $background->getClientOriginalName();
            $background->move(public_path('assets/images'), $backgroundName);
            $backgroundPath = 'assets/images/' . $backgroundName;
        }

        $memberCategory->update([
            'title' => $request->title,
            'period' => $request->period,
            'description' => $request->description,
            'background' => $backgroundPath,
        ]);

        return redirect()->route('member-categories.index')->with('success', 'Member category successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MemberCategory $memberCategory)
    {
        if ($memberCategory->background && $memberCategory->background !== 'assets/images/No_Image_Available.png') {
            $filePath = public_path($memberCategory->background);
            if (File::exists($filePath)) {
                File::delete($filePath);
            }
        }

        $memberCategory->delete();

        return redirect()->route('member-categories.index')->with('success', 'Member category deleted successfully');
    }
}