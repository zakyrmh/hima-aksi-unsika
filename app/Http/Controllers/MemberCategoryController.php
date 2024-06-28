<?php

namespace App\Http\Controllers;

use App\Models\MemberCategory;
use Illuminate\Http\Request;

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
            'title' => 'Create Member Category',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(MemberCategory $memberCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MemberCategory $memberCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MemberCategory $memberCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MemberCategory $memberCategory)
    {
        //
    }
}