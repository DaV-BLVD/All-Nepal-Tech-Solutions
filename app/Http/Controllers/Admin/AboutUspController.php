<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutUsp;
use App\Models\AboutStat;

class AboutUspController extends Controller
{
    public function index()
    {
        $usps = AboutUsp::orderBy('order')->get();
        $stats = AboutStat::orderBy('order')->get();
        return view('admin.about_usps.index', compact('usps', 'stats'));
    }

    // --- USP METHODS (The Cards) ---

    public function createUsp()
    {
        return view('admin.about_usps.form', ['usp' => new AboutUsp()]);
    }

    public function editUsp(AboutUsp $usp)
    {
        return view('admin.about_usps.form', compact('usp'));
    }

    public function storeUsp(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'icon' => 'required',
            'order' => 'nullable|integer'
        ]);

        AboutUsp::create($data);
        return redirect()->route('why_choose_us.index')->with('success', 'USP created successfully');
    }

    public function updateUsp(Request $request, AboutUsp $usp)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'icon' => 'required',
            'order' => 'nullable|integer'
        ]);

        $usp->update($data);
        return redirect()->route('why_choose_us.index')->with('success', 'USP updated successfully');
    }

    public function destroyUsp(AboutUsp $usp)
    {
        $usp->delete();
        return back()->with('success', 'USP deleted');
    }


    // --- STAT METHODS (The Numbers) ---

    public function createStat()
    {
        return view('admin.about_usps.form', ['stat' => new AboutStat()]);
    }

    public function editStat(AboutStat $stat)
    {
        return view('admin.about_usps.form', compact('stat'));
    }

    public function storeStat(Request $request)
    {
        $data = $request->validate([
            'label' => 'required|string|max:255',
            'value' => 'required|string|max:50',
            'order' => 'nullable|integer'
        ]);

        AboutStat::create($data);
        return redirect()->route('why_choose_us.index')->with('success', 'Stat created successfully');
    }

    public function updateStat(Request $request, AboutStat $stat)
    {
        $data = $request->validate([
            'label' => 'required|string|max:255',
            'value' => 'required|string|max:50',
            'order' => 'nullable|integer'
        ]);

        $stat->update($data);
        return redirect()->route('why_choose_us.index')->with('success', 'Stat updated successfully');
    }

    public function destroyStat(AboutStat $stat)
    {
        $stat->delete();
        return back()->with('success', 'Stat deleted');
    }
}