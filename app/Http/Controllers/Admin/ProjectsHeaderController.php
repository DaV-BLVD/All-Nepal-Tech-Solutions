<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProjectsHeader;
use Illuminate\Http\Request;

class ProjectsHeaderController extends Controller
{
    public function index()
    {
        $header = ProjectsHeader::first() ?? new ProjectsHeader();
        return view('admin.projects-header.index', compact('header'));
    }

    public function edit($id)
    {
        $header = ProjectsHeader::findOrFail($id);
        return view('admin.projects-header.form', compact('header'));
    }

    public function update(Request $request, $id)
    {
        $header = ProjectsHeader::findOrFail($id);

        $validated = $request->validate([
            'badge' => 'required|string|max:100',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $header->update($validated);

        return redirect()->route('projects-header.index')
            ->with('success', 'Projects Header updated successfully.');
    }
}