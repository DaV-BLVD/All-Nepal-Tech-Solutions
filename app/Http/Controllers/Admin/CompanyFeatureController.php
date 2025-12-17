<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CompanyFeature;
class CompanyFeatureController extends Controller
{
    public function index()
    {
        $features = CompanyFeature::all();
        return view('admin.company.features.index', compact('features'));
    }

    public function create()
    {
        return view('admin.company.features.form', ['feature' => new CompanyFeature()]);
    }

    public function edit(CompanyFeature $feature)
    {
        return view('admin.company.features.form', compact('feature'));
    }

    public function store(Request $request)
    {
        CompanyFeature::create($request->all());
        return redirect()->route('features.index');
    }

    public function update(Request $request, CompanyFeature $feature)
    {
        $feature->update($request->all());
        return redirect()->route('features.index');
    }

    public function destroy(CompanyFeature $feature)
    {
        $feature->delete();
        return back();
    }
}

