<?php

// app/Http/Controllers/Admin/UspController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Usp;
use Illuminate\Http\Request;

class UspController extends Controller
{
    public function index()
    {
        $usps = Usp::orderBy('id', 'asc')->get();
        return view('admin.usps.index', compact('usps'));
    }

    public function create()
    {
        return view('admin.usps.form', ['usp' => new Usp()]);
    }

    public function edit(Usp $usp)
    {
        return view('admin.usps.form', compact('usp'));
    }

    public function store(Request $request)
    {
        $data = $request->validate(['title' => 'required', 'description' => 'required', 'icon' => 'nullable']);
        Usp::create($data);
        return redirect()->route('why_choose_us.index')->with('success', 'Created!');
    }

    public function update(Request $request, Usp $usp)
    {
        $data = $request->validate(['title' => 'required', 'description' => 'required', 'icon' => 'nullable']);
        $usp->update($data);
        return redirect()->route('why_choose_us.index')->with('success', 'Updated!');
    }

    public function destroy(Usp $usp)
    {
        $usp->delete();
        return back();
    }
}
