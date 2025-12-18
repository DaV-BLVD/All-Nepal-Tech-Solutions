<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Statistic;
use Illuminate\Http\Request;


class StatisticController extends Controller
{
    public function index()
    {
        $statistics = Statistic::orderBy('id','asc')->get();
        return view('admin.statistics.index', compact('statistics'));
    }


    public function create()
    {
        return view('admin.statistics.form', ['statistic' => new Statistic()]);
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'value' => 'required|integer',
            'suffix' => 'nullable|string',
            'is_active' => 'nullable',
        ]);


        Statistic::create($data);
        return redirect()->route('statistics.index');
    }


    public function edit(Statistic $statistic)
    {
        return view('admin.statistics.form', compact('statistic'));
    }


    public function update(Request $request, Statistic $statistic)
    {
        $data = $request->validate([
            'title' => 'required',
            'value' => 'required|integer',
            'suffix' => 'nullable|string',
            'is_active' => 'nullable',
        ]);


        $statistic->update($data);
        return redirect()->route('statistics.index');
    }


    public function destroy(Statistic $statistic)
    {
        $statistic->delete();
        return back();
    }
}