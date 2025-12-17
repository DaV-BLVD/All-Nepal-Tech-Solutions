<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyStatement;
use Illuminate\Http\Request;

class CompanyStatementController extends Controller
{
    public function index()
    {
        $statement = CompanyStatement::first();
        return view('admin.statements.index', compact('statement'));
    }

    public function edit()
    {
        $statement = CompanyStatement::first() ?? new CompanyStatement();
        return view('admin.statements.form', compact('statement'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'mission_text' => 'required',
            'vision_text' => 'required',
            'mission_points' => 'required|array',
            'vision_points' => 'required|array',
        ]);

        $statement = CompanyStatement::first() ?? new CompanyStatement();
        $statement->fill($data)->save();

        return redirect()->route('company_statement.index')->with('success', 'Statements updated!');
    }
}