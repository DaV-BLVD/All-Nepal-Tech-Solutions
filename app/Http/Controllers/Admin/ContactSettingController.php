<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactSetting;

class ContactSettingController extends Controller
{
    public function index()
    {
        $settings = ContactSetting::all();
        return view('admin.contact_settings.index', compact('settings'));
    }

    public function create()
    {
        return view('admin.contact_settings.form', ['setting' => new ContactSetting()]);
    }

    public function edit(ContactSetting $contactSetting)
    {
        return view('admin.contact_settings.form', ['setting' => $contactSetting]);
    }

    public function store(Request $request)
    {
        ContactSetting::create($request->validate([
            'title' => 'required',
            'description' => 'required',
            'phone' => 'required',
            'button_text' => 'required',
            'button_link' => 'required',
        ]));
        return redirect()->route('contact_settings.index');
    }

    public function update(Request $request, ContactSetting $contactSetting)
    {
        $contactSetting->update($request->all());
        return redirect()->route('contact_settings.index');
    }
}
