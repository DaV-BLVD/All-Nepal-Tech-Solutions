<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Frontend\ContactController;
use App\Models\ContactCard;
use App\Models\SocialLink;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\CompanyFeature;
use App\Models\CompanySection;
use App\Models\Excellence;
use App\Models\Statistic;
use App\Models\TeamMember;
use App\Models\ContactSetting;
use App\Models\Milestone;
use App\Models\CompanyStatement;
use App\Models\CoreValue;
use App\Models\AboutService;
use App\Models\Usp;
use App\Models\Projects;
use App\Models\ComprehensiveService;
use App\Models\WhyChooseUsFeature;
use App\Models\Consult;

class DashboardController extends Controller
{
    public function index()
    {

        return view('admin.dashboard', [
            'usersCount' => User::count(),
            'serviceCount' => Service::count(),
            'sectionCount' => CompanySection::count(),
            'featureCount' => CompanyFeature::count(),
            'excellenceCount' => Excellence::count(),
            'statisticsCount' => Statistic::count(),
            'teamMemberCount' => TeamMember::count(),
            'contactSettingCount' => ContactSetting::count(),

            'milestoneCount' => Milestone::count(),
            'companyStatementCount' => CompanyStatement::count(),
            'coreValueCount' => CoreValue::count(),
            'aboutServiceCount' => AboutService::count(),
            'whyChooseUsCount' => Usp::count(),

            'projectsCount' => Projects::count(),

            'comprehensiveServiceCount' => ComprehensiveService::count(),
            'whyChooseUsFeatureCount' => WhyChooseUsFeature::count(),
            'consultCount' => Consult::count(),
            'contactCardCount' => ContactCard::count(),
            'socialCount' => SocialLink::count(),
        ]);
    }
}
