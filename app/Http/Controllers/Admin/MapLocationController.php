<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MapLocation;

class MapLocationController extends Controller
{
    public function index()
    {
        $locations = MapLocation::orderBy('order')->get();
        return view('admin.map_locations.index', compact('locations'));
    }

    public function create()
    {
        $location = MapLocation::first();

        if ($location) {
            return redirect()->route('map_locations.edit', $location);
        }

        return view('admin.map_locations.form', [
            'location' => new MapLocation()
        ]);
    }



    public function store(Request $request)
    {
        if (MapLocation::exists()) {
            return redirect()
                ->route('map_locations.index')
                ->with('success', 'A map location already exists.');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'iframe_url' => 'required|string',
            'order' => 'nullable|integer',
        ]);

        MapLocation::create($request->only([
            'title',
            'iframe_url',
            'order',
        ]));

        return redirect()
            ->route('map_locations.index')
            ->with('success', 'Map location created.');
    }


    public function edit(MapLocation $map_location)
    {
        return view('admin.map_locations.form', ['location' => $map_location]);
    }

    public function update(Request $request, MapLocation $map_location)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'iframe_url' => 'required|url',
            'order' => 'nullable|integer',
        ]);

        $map_location->update($request->all());
        return redirect()->route('map_locations.index')->with('success', 'Map location updated.');
    }

    public function destroy(MapLocation $map_location)
    {
        $map_location->delete();
        return redirect()->route('map_locations.index')->with('success', 'Map location deleted.');
    }
}
