<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutUsHeader;
use Illuminate\Http\Request;

class AboutUsHeaderController extends Controller
{
    public function index()
    {
        $header = AboutUsHeader::first();
        return view('admin.about-header.index', compact('header'));
    }

    public function edit()
    {
        $header = AboutUsHeader::first();
        return view('admin.about-header.form', compact('header'));
    }

    public function update(Request $request)
    {
        $header = AboutUsHeader::first();

        $data = $request->validate([
            'title' => 'required|string',
            'subtitle' => 'required|string',
            'description' => 'required|string',
            'features' => 'array'
        ]);

        $header->update($data);
        return redirect()->route('about-header.index')->with('success', 'Header updated!');
    }
}
