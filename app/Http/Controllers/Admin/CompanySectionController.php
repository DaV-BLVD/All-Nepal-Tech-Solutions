<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CompanySection;

class CompanySectionController extends Controller
{
    public function edit()
    {
        $section = CompanySection::first();
        return view('admin.company.section-form', compact('section'));
    }

    public function update(Request $request)
    {
        CompanySection::first()->update($request->all());
        return back()->with('success', 'Updated');
    }
}

