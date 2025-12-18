<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ComprehensiveService;

class ServiceController extends Controller
{
    public function index()
    {
        $services = ComprehensiveService::orderBy('order')->get();

        return view("frontend.pages.services", compact("services"));
    }
}
