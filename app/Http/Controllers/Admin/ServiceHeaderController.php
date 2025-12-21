<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceHeader;
use Illuminate\Http\Request;

class ServiceHeaderController extends Controller
{
    public function index()
    {
        $header = ServiceHeader::first() ?? new ServiceHeader();
        return view('admin.service-header.index', compact('header'));
    }

    public function edit($id)
    {
        $header = ServiceHeader::findOrFail($id);
        return view('admin.service-header.form', compact('header'));
    }

    public function update(Request $request, $id)
    {
        $header = ServiceHeader::findOrFail($id);
        $validated = $request->validate([
            'title' => 'required|string',
            'highlighted_text' => 'required|string',
            'description' => 'required|string',
            'bg_icon' => 'nullable|string',
            'btn_primary_text' => 'required|string',
            'btn_primary_link' => 'required|string',
            'btn_secondary_text' => 'required|string',
            'btn_secondary_link' => 'required|string',
        ]);

        $header->update($validated);
        return redirect()->route('service-header.index')->with('success', 'Service Header Updated');
    }
}