<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\CompanyFeature;
use App\Models\CompanySection;
use App\Models\Excellence;
use App\Models\Statistic;
use App\Models\TeamMember;
use App\Models\ContactSetting;

class DashboardController extends Controller
{
    public function index()
    {

        return view('admin.dashboard', [
            'serviceCount' => Service::count(),
            'sectionCount' => CompanySection::count(),
            'featureCount' => CompanyFeature::count(),
            'excellenceCount' => Excellence::count(),
            'statisticsCount' => Statistic::count(),
            'teamMemberCount' => TeamMember::count(),
            'contactSettingCount' => ContactSetting::count()
        ]);
    }
}
