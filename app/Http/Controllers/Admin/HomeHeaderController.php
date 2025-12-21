<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeHeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeHeaderController extends Controller
{
    public function index()
    {
        $header = HomeHeader::firstOrFail();
        return view('admin.home-header.index', compact('header'));
    }


    public function edit($id)
    {
        $header = HomeHeader::findOrFail($id);
        return view('admin.home-header.form', compact('header'));
    }

    public function update(Request $request, $id)
    {
        $header = HomeHeader::findOrFail($id);

        $data = $request->validate([
            'badge' => 'required|string',
            'title' => 'required|string',
            'title_highlight' => 'required|string',
            'description' => 'required|string',
            'button_text' => 'required|string',
            'button_link' => 'required|string',
            'image_mobile' => 'nullable|image|mimes:jpeg,png,jpg,webp',
            'image_tablet' => 'nullable|image|mimes:jpeg,png,jpg,webp',
            'image_laptop' => 'nullable|image|mimes:jpeg,png,jpg,webp',
        ]);

        foreach (['image_mobile', 'image_tablet', 'image_laptop'] as $imgKey) {
            if ($request->hasFile($imgKey)) {
                // Delete old image if it exists
                if ($header->$imgKey && Storage::disk('public')->exists($header->$imgKey)) {
                    Storage::disk('public')->delete($header->$imgKey);
                }

                // Store new image
                $path = $request->file($imgKey)->store('home-hero', 'public');
                $data[$imgKey] = $path;
            } else {
                // Ensure we don't overwrite existing image path with null 
                // if no new file was uploaded
                unset($data[$imgKey]);
            }
        }

        $header->update($data);

        return redirect()->route('home-header.index')->with('success', 'Home Hero updated!');
    }
}