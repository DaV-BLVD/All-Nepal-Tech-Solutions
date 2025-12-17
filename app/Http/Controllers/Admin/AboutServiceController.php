<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutService;
use Illuminate\Http\Request;

class AboutServiceController extends Controller
{
    public function index()
    {
        $services = AboutService::orderBy('order')->get();
        return view('admin.about_services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.about_services.form', ['service' => new AboutService()]);
    }

    public function edit(AboutService $aboutService)
    {
        return view('admin.about_services.form', ['service' => $aboutService]);
    }

    public function store(Request $request)
    {
        $data = $this->validateService($request);
        AboutService::create($data);
        return redirect()->route('about_services.index')->with('success', 'Service created!');
    }

    public function update(Request $request, AboutService $aboutService)
    {
        $data = $this->validateService($request);
        $aboutService->update($data);
        return redirect()->route('about_services.index')->with('success', 'Service updated!');
    }

    public function destroy(AboutService $aboutService)
    {
        $aboutService->delete();
        return back()->with('success', 'Service deleted!');
    }

    private function validateService($request)
    {
        return $request->validate([
            'title' => 'required|string|max:255',
            'icon' => 'required',
            'color_theme' => 'required',
            'description' => 'required',
            'features' => 'required|array',
            'order' => 'nullable|integer'
        ]);
    }
}