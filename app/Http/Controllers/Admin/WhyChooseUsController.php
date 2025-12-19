<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WhyChooseUsFeature;
use Illuminate\Http\Request;

class WhyChooseUsController extends Controller
{
    public function index()
    {
        $features = WhyChooseUsFeature::orderBy('order')->get();
        return view('admin.why_choose_us_services.index', compact('features'));
    }

    public function create()
    {
        return view('admin.why_choose_us_services.form', [
            'feature' => new WhyChooseUsFeature()
        ]);
    }

    public function store(Request $request)
    {
        WhyChooseUsFeature::create(
            $request->validate([
                'title' => 'required|string',
                'subtitle' => 'nullable|string',
                'type' => 'required|in:checkpoint,stat',
                'order' => 'integer'
            ])
        );

        return redirect()->route('why_choose_us_services.index')
            ->with('success', 'Created successfully');
    }

    public function edit(WhyChooseUsFeature $why_choose_us_service)
    {
        return view('admin.why_choose_us_services.form', [
            'feature' => $why_choose_us_service
        ]);
    }

    public function update(Request $request, WhyChooseUsFeature $why_choose_us_service)
    {
        $why_choose_us_service->update(
            $request->validate([
                'title' => 'required|string',
                'subtitle' => 'nullable|string',
                'type' => 'required|in:checkpoint,stat',
                'order' => 'integer'
            ])
        );

        return redirect()->route('why_choose_us_services.index')
            ->with('success', 'Updated successfully');
    }

    public function destroy(WhyChooseUsFeature $why_choose_us_service)
    {
        $why_choose_us_service->delete();
        return back();
    }
}
