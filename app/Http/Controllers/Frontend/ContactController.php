<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactCard;

class ContactController extends Controller
{
    public function index()
    {
        $cards = ContactCard::orderBy('order')->get();

        return view("frontend.pages.contactus", compact("cards"));
    }
}
