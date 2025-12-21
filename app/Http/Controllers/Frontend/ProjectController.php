<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Projects;
use App\Models\ProjectsHeader;

class ProjectController extends Controller
{
    public function index()
    {
        $projectsHeader = ProjectsHeader::first();

        if (!$projectsHeader) {
            $projectsHeader = (object) [
                'badge' => 'INNOVATION',
                'title' => 'Our Projects',
                'description' => 'Default description about our masterpieces.'
            ];
        }

        $projects = Projects::all();
        // Get unique categories for the filter buttons
        $categories = Projects::select('category')->distinct()->pluck('category');

        return view("frontend.pages.projects", compact("projects", "categories", "projectsHeader"));
    }
}
