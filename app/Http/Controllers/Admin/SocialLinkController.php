<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SocialLink;
use Illuminate\Http\Request;

class SocialLinkController extends Controller
{
    public function index()
    {
        $links = SocialLink::orderBy('order')->get();
        return view('admin.social_links.index', compact('links'));
    }

    public function create()
    {
        $link = new SocialLink();
        return view('admin.social_links.form', compact('link'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'platform' => 'required|string|max:255',
            'icon' => 'required|string|max:255',
            'url' => 'required|url|max:255',
            'order' => 'nullable|integer',
        ]);

        SocialLink::create($request->all());
        return redirect()->route('social_links.index')->with('success', 'Social link created successfully.');
    }

    public function edit(SocialLink $socialLink)
    {
        $link = $socialLink;
        return view('admin.social_links.form', compact('link'));
    }

    public function update(Request $request, SocialLink $socialLink)
    {
        $request->validate([
            'platform' => 'required|string|max:255',
            'icon' => 'required|string|max:255',
            'url' => 'required|url|max:255',
            'order' => 'nullable|integer',
        ]);

        $socialLink->update($request->all());
        return redirect()->route('social_links.index')->with('success', 'Social link updated successfully.');
    }

    public function destroy(SocialLink $socialLink)
    {
        $socialLink->delete();
        return redirect()->route('social_links.index')->with('success', 'Social link deleted successfully.');
    }
}
