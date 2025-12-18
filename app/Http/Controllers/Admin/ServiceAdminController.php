<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ComprehensiveService;
use Illuminate\Http\Request;

class ServiceAdminController extends Controller
{
    public function index()
    {
        $services = ComprehensiveService::orderBy('order')->get();
        return view('admin.comprehensive_service.index', compact('services'));
    }

    public function create()
    {
        $service = new ComprehensiveService();
        return view('admin.comprehensive_service.form', compact('service'));
    }

    public function store(Request $request)
    {
        ComprehensiveService::create($request->all());
        return redirect()->route('comprehensive_services.index');
    }

    public function edit(ComprehensiveService $service)
    {
        return view('admin.comprehensive_service.form', compact('service'));
    }

    public function update(Request $request, ComprehensiveService $service)
    {
        $service->update($request->all());
        return redirect()->route('comprehensive_services.index');
    }

    public function destroy(ComprehensiveService $service)
    {
        $service->delete();
        return back();
    }
}