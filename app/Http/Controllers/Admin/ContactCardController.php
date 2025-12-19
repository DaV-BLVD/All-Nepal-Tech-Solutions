<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactCard;
use Illuminate\Http\Request;

class ContactCardController extends Controller
{
    public function index()
    {
        $cards = ContactCard::orderBy('order')->get();
        return view('admin.contact_cards.index', compact('cards'));
    }

    public function create()
    {
        $card = new ContactCard();
        return view('admin.contact_cards.form', compact('card'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'icon' => 'required|string|max:255',
            'line1' => 'nullable|string',
            'line2' => 'nullable|string',
            'order' => 'nullable|integer',
        ]);

        ContactCard::create($request->all());
        return redirect()->route('contact_cards.index')->with('success', 'Card created successfully.');
    }

    public function edit(ContactCard $contactCard)
    {
        $card = $contactCard;
        return view('admin.contact_cards.form', compact('card'));
    }

    public function update(Request $request, ContactCard $contactCard)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'icon' => 'required|string|max:255',
            'line1' => 'nullable|string',
            'line2' => 'nullable|string',
            'order' => 'nullable|integer',
        ]);

        $contactCard->update($request->all());
        return redirect()->route('contact_cards.index')->with('success', 'Card updated successfully.');
    }

    public function destroy(ContactCard $contactCard)
    {
        $contactCard->delete();
        return redirect()->route('contact_cards.index')->with('success', 'Card deleted successfully.');
    }
}
