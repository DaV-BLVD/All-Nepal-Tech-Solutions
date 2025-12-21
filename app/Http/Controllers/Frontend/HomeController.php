<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\CompanySection;
use App\Models\CompanyFeature;
use App\Models\Excellence;
use App\Models\Statistic;
use App\Models\TeamMember;
use App\Models\ContactSetting;
use App\Models\HomeHeader;

class HomeController extends Controller
{
    public function index()
    {
        $homeHeader = HomeHeader::first();

        $services = Service::where('is_active', true)->orderBy('id', 'asc')->get();

        $section = CompanySection::first();
        $features = CompanyFeature::where('is_active', true)->get();

        $excellences = Excellence::where('is_active', true)->get();

        $statistics = Statistic::where('is_active', true)->get();

        $teamMembers = TeamMember::where('is_active', true)->get();

        $cta = ContactSetting::first(); // Get the active CTA

        return view('frontend.pages.home', compact('services', 'section', 'features', 'excellences', 'statistics', 'teamMembers', 'cta', 'homeHeader'));
    }
}
