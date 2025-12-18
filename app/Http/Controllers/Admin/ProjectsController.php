<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Projects;

class ProjectsController extends Controller
{
    public function index()
    {
        $projects = Projects::orderBy('id','asc')->get();
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.form', ['project' => new Projects()]);
    }

    public function store(Request $request)
    {
        Projects::create($request->validate([
            'title' => 'required',
            'category' => 'required',
            'description' => 'required',
            'icon_svg' => 'required',
            'icon_bg_color' => 'required',
            'link' => 'nullable'
        ]));
        return redirect()->route('projects.index');
    }

    public function edit(Projects $project)
    {
        return view('admin.projects.form', compact('project'));
    }

    public function update(Request $request, Projects $project)
    {
        $project->update($request->all());
        return redirect()->route('projects.index');
    }

    public function destroy(Projects $project)
    {
        $project->delete();
        return back();
    }
}
