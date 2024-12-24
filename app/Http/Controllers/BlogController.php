<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.blog');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:blogs,slug',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'keywords' => 'required',
            'meta_description' => 'required',
            'description' => 'required',
        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('uploads/blogs', $imageName, 'public');
        } else {
            return back()->with('error', 'Image upload failed.');
        }
        $blog = new Blog();
        $blog->title = $request->title;
        $blog->slug = $request->slug;
        $blog->image = $imagePath;
        $blog->keywords = $request->keywords;
        $blog->meta_description = $request->meta_description;
        $blog->description = $request->description;
        $blog->save();
        return redirect()->back()->with('success', 'Blog created successfully.');
    }
    public function read()
    {
        $blogs = Blog::latest()->get();
        return view('admin.blog_list', compact('blogs'));
    }
    public function delete($id)
    {
        $blog = Blog::find($id);
        $blog->delete();
        return redirect()->back()->with('success', 'Blog deleted successfully');
    }
    public function edit($id)
    {
        $blog = Blog::find($id);
        return view('admin.edit_blog', compact('blog'));
    }
    public function update($id, Request $request)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:blogs,slug,' . $id, // Ignore the current blog's slug
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048', // Image is optional
            'keywords' => 'required',
            'meta_description' => 'required',
            'description' => 'required',
        ]);

        $blog = Blog::find($id);

        if (!$blog) {
            return redirect()->back()->with('error', 'Blog not found.');
        }
        if ($request->hasFile('image')) {
            if ($blog->image && \Storage::disk('public')->exists($blog->image)) {
                \Storage::disk('public')->delete($blog->image);
            }

            // Upload the new image
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('uploads/blogs', $imageName, 'public');
            $blog->image = $imagePath; // Save the new image path
        }

        // Update other fields
        $blog->title = $request->title;
        $blog->slug = $request->slug;
        $blog->keywords = $request->keywords;
        $blog->meta_description = $request->meta_description;
        $blog->description = $request->description;
        $blog->save();
        return redirect()->route('blog.read')->with('success', 'Blog updated successfully.');
    }
}