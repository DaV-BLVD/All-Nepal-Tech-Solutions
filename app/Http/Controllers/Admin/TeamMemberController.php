<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamMemberController extends Controller
{
    // List all team members
    public function index()
    {
        $teamMembers = TeamMember::orderBy('id', 'asc')->get();
        return view('admin.team_members.index', compact('teamMembers'));
    }

    // Show create form
    public function create()
    {
        return view('admin.team_members.form');
    }

    // Store new team member
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'specialization' => 'required|string|max:255',
            'company' => 'nullable|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'is_active' => 'required|boolean',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('team', 'public');
        }

        TeamMember::create($data);

        return redirect()->route('team_members.index')->with('success', 'Team member created successfully!');
    }

    // Show edit form
    public function edit(TeamMember $teamMember)
    {
        return view('admin.team_members.form', compact('teamMember'));
    }

    // Update team member
    public function update(Request $request, TeamMember $teamMember)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'specialization' => 'required|string|max:255',
            'company' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'is_active' => 'required|boolean',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image
            if ($teamMember->image) {
                Storage::disk('public')->delete($teamMember->image);
            }
            $data['image'] = $request->file('image')->store('team', 'public');
        }

        $teamMember->update($data);

        return redirect()->route('team_members.index')->with('success', 'Team member updated successfully!');
    }

    // Delete team member
    public function destroy(TeamMember $teamMember)
    {
        if ($teamMember->image) {
            Storage::disk('public')->delete($teamMember->image);
        }

        $teamMember->delete();

        return redirect()->route('team_members.index')->with('success', 'Team member deleted successfully!');
    }
}
