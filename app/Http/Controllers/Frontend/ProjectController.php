<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Projects;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Projects::all();
        // Get unique categories for the filter buttons
        $categories = Projects::select('category')->distinct()->pluck('category');

        return view("frontend.pages.projects", compact("projects", "categories"));
    }
}
