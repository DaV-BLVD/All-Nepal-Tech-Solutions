<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactCard;
use App\Models\SocialLink;
use App\Models\Usp;
use App\Models\MapLocation;
use App\Models\ContactHeader;

class ContactController extends Controller
{
    public function index()
    {
        $contactHeader = ContactHeader::first() ?? new ContactHeader();

        $cards = ContactCard::orderBy('order')->get();

        $socialLinks = SocialLink::orderBy('order')->get();

        $usps = Usp::orderBy('id', 'asc')->get();

        $maps = MapLocation::orderBy('order')->get();

        return view("frontend.pages.contactus", compact("cards", "socialLinks", "usps", "maps", "contactHeader"));
    }
}
