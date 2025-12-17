<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\CompanyFeature;
use App\Models\CompanySection;

class DashboardController extends Controller
{
    public function index()
    {

        return view('admin.dashboard', [
            'serviceCount' => Service::count(),
            'featureCount' => CompanyFeature::count(),
            'sectionCount' => CompanySection::count(),
        ]);
    }
}
