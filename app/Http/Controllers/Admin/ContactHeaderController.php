<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactHeader;
use Illuminate\Http\Request;

class ContactHeaderController extends Controller
{
    public function index()
    {
        $header = ContactHeader::first() ?? new ContactHeader();
        return view('admin.contact-header.index', compact('header'));
    }

    public function edit($id)
    {
        $header = ContactHeader::findOrFail($id);
        return view('admin.contact-header.form', compact('header'));
    }

    public function update(Request $request, $id)
    {
        $header = ContactHeader::findOrFail($id);
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'support_text' => 'required|string|max:255',
            'support_icon' => 'required|string|max:255',
        ]);

        $header->update($validated);
        return redirect()->route('contact-header.index')->with('success', 'Contact Header updated.');
    }
}