<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Consult;
use Illuminate\Http\Request;

class ConsultController extends Controller
{
    public function index()
    {
        $consults = Consult::orderBy('id', 'asc')->get();
        return view('admin.consults.index', compact('consults'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'service' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        Consult::create($request->all());

        return back()->with('success', 'Thank you for your message! We will contact you shortly.');
    }

    public function resolve(Consult $consult)
    {
        $consult->update(['is_resolved' => true]);
        return back()->with('success', 'Consult marked as resolved.');
    }

    public function destroy(Consult $consult)
    {
        $consult->delete();
        return back()->with('success', 'Consult deleted.');
    }

    public function undo(Consult $consult)
    {
        $consult->update(['is_resolved' => false]);
        return back()->with('success', 'Consult marked as pending.');
    }

    public function show(Consult $consult)
    {
        return view('admin.consults.show', compact('consult'));
    }
}
