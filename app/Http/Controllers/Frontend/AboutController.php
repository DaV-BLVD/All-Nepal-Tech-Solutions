<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Milestone;
use App\Models\CoreValue;

class AboutController extends Controller
{
    public function index() {

        $milestones = Milestone::where('is_active', true)->orderBy('id', 'asc')->get();

        $coreValues = CoreValue::where('is_active', true)->orderBy('id', 'asc')->get();

        return view("frontend.pages.aboutus", compact("milestones", "coreValues"));
    }
}
