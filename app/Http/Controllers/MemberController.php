<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use App\Models\MemberCategory;
use Illuminate\Support\Facades\File;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("dashboard.pages.members.index", [
            'title' => 'Members',
            'members' => Member::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {


        return view("dashboard.pages.members.create", [
            'title' => 'Members',
            'memberCategories' => MemberCategory::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:255',
            'position' => 'required|string',
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'member_category_id' => 'required|exists:member_categories,id',
        ]);

        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoName = time() . '_' . $photo->getClientOriginalName();
            $photo->move(public_path('assets/images'), $photoName);
            $photoPath = 'assets/images/' . $photoName;
        }

        Member::create([
            'name' => $request->name,
            'position' => $request->position,
            'photo' => $photoPath,
            'member_category_id' => $request->member_category_id,
        ]);

        return redirect()->route('members.index')->with('success', 'New member successfully created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Member $member)
    {
        return view("dashboard.pages.members.edit", [
            'title' => 'Members',
            'member' => $member
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Member $member)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:255',
            'position' => 'required|string',
            'section' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $photoPath = $member->photo;

        if ($request->hasFile('photo')) {
            // Delete old photo if exists
            if ($photoPath) {
                if (file_exists(public_path($photoPath))) {
                    unlink(public_path($photoPath));
                }
            }

            $photo = $request->file('photo');
            $photoName = time() . '_' . $photo->getClientOriginalName();
            $photo->move(public_path('assets/images'), $photoName);
            $photoPath = 'assets/images/' . $photoName;
        }

        $member->update([
            'name' => $request->name,
            'position' => $request->position,
            'section' => $request->section,
            'photo' => $photoPath,
        ]);

        return redirect()->route('members.index')->with('success', 'Member successfully updated');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member)
    {
        // Hapus foto jika ada
        if ($member->photo) {
            $filePath = public_path($member->photo);
            if (File::exists($filePath)) {
                File::delete($filePath);
            }
        }

        // Hapus member dari database
        $member->delete();

        return redirect()->route('members.index')->with('success', 'Member deleted successfully');
    }
}