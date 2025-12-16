<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('id', 'asc')->get();
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.form', ['service' => new Service()]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'icon' => 'required',
            'description' => 'required',
        ]);

        Service::create($request->all());

        return redirect()->route('services.index')->with('success', 'Service created');
    }

    public function edit(Service $service)
    {
        return view('admin.services.form', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $request->validate([
            'title' => 'required',
            'icon' => 'required',
            'description' => 'required',
        ]);

        $service->update($request->all());

        return redirect()->route('services.index')->with('success', 'Service updated');
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return back()->with('success', 'Service deleted');
    }
}
