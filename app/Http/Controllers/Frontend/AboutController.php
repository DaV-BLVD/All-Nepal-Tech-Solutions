<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Milestone;
use App\Models\CoreValue;
use App\Models\CompanyStatement;
use App\Models\AboutService;
use App\Models\Usp;

class AboutController extends Controller
{
    public function index()
    {

        $milestones = Milestone::where('is_active', true)->orderBy('id', 'asc')->get();

        $coreValues = CoreValue::where('is_active', true)->orderBy('id', 'asc')->get();

        $statement = CompanyStatement::first();

        $aboutServices = AboutService::orderBy('order')->get();

        $usps = Usp::orderBy('id', 'asc')->get();

        $projects = Projects::all();
        // Get unique categories for the filter buttons
        $categories = Projects::select('category')->distinct()->pluck('category');

        return view("frontend.pages.aboutus", compact("milestones", "coreValues", "statement", "aboutServices", "usps"));
    }
}
