<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanySection;
use Illuminate\Http\Request;

class CompanySectionController extends Controller
{
    public function index()
    {
        // Always only one row
        $section = CompanySection::first();

        return view('admin.company.section-form.index', compact('section'));
    }

    public function edit()
    {
        $section = CompanySection::first();

        return view('admin.company.section-form.form', compact('section'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'small_title' => 'required',
            'main_title' => 'required',
            'highlight_title' => 'required',
            'description' => 'required',
        ]);

        CompanySection::first()->update($request->all());

        return redirect()
            ->route('section.index')
            ->with('success', 'Company section updated');
    }
}
