<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Milestone;

class MilestoneController extends Controller
{
    public function index()
    {
        $milestones = Milestone::orderBy('id', 'asc')->get();
        return view('admin.milestones.index', compact('milestones'));
    }

    public function create()
    {
        return view('admin.milestones.form', ['milestone' => new Milestone()]);
    }

    public function edit(Milestone $milestone)
    {
        return view('admin.milestones.form', compact('milestone'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'year' => 'required',
            'title' => 'required',
            'description' => 'required',
            'icon' => 'required',
            'order' => 'numeric',
        ]);
        Milestone::create($data);
        return redirect()->route('milestones.index')->with('success', 'Milestone added!');
    }

    public function update(Request $request, Milestone $milestone)
    {
        $milestone->update($request->all());
        return redirect()->route('milestones.index')->with('success', 'Milestone updated!');
    }
}
