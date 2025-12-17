<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Excellence;
use Illuminate\Http\Request;


class ExcellenceController extends Controller
{
    public function index()
    {
        $excellences = Excellence::latest()->get();
        return view('admin.excellence.index', compact('excellences'));
    }


    public function create()
    {
        return view('admin.excellence.form', ['excellence' => new Excellence()]);
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'image' => 'required',
            'description' => 'required',
            'is_active' => 'nullable'
        ]);


        Excellence::create($data);
        return redirect()->route('excellence.index');
    }


    public function edit(Excellence $excellence)
    {
        return view('admin.excellence.form', compact('excellence'));
    }


    public function update(Request $request, Excellence $excellence)
    {
        $data = $request->validate([
            'title' => 'required',
            'image' => 'required',
            'description' => 'required',
            'is_active' => 'nullable'
        ]);


        $excellence->update($data);
        return redirect()->route('excellence.index');
    }


    public function destroy(Excellence $excellence)
    {
        $excellence->delete();
        return back();
    }
}