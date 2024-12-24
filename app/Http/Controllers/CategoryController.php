<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Faker\Provider\ar_EG\Company;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.category.form');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:categories,slug',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle file upload
        $logoPath = null;
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('logos', 'public');
        }
        // Save to database
        Category::create([
            'name' => $request->input('name'),
            'slug' => $request->input('slug'),
            'logo' => $logoPath,
        ]);

        // Redirect with success message
        return redirect()->back()->with('success', 'Game added successfully!');
    }

    public function list(Request $request)
    {
        $games = Category::all();
        return view('admin.category.list', compact('games'));
    }
    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}