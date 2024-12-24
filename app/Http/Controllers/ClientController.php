<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.client');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'fb_link' => 'required',
            'insta_link' => 'required',
            'description' => 'required',
        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('uploads', $imageName, 'public');
        } else {
            return back()->with('error', 'Image upload failed.');
        }
        $client = new Client();
        $client->name = $request->name;
        $client->fb_link = $request->fb_link;
        $client->image = $imagePath;
        $client->insta_link = $request->insta_link;
        $client->description = $request->description;
        $client->save();
        return redirect()->back()->with('success', 'Client created successfully.');
    }
}