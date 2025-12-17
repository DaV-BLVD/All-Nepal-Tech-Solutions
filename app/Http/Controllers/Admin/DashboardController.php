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
            'sectionCount' => CompanySection::count(),
            'featureCount' => CompanyFeature::count(),
        ]);
    }
}
