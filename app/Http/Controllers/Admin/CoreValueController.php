<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CoreValue;

class CoreValueController extends Controller
{
    public function index()
    {
        $values = CoreValue::orderBy('id', 'asc')->get();
        return view('admin.core_values.index', compact('values'));
    }

    public function create()
    {
        return view('admin.core_values.form', ['value' => new CoreValue()]);
    }

    public function edit(CoreValue $coreValue)
    {
        return view('admin.core_values.form', ['value' => $coreValue]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'icon' => 'required|string',
            'description' => 'required',
            'sort_order' => 'integer',
        ]);
        CoreValue::create($data);
        return redirect()->route('core_values.index')->with('success', 'Value created successfully');
    }

    public function update(Request $request, CoreValue $coreValue)
    {
        $coreValue->update($request->all());
        return redirect()->route('core_values.index')->with('success', 'Value updated successfully');
    }
}
