<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ComprehensiveService;
use App\Models\WhyChooseUsFeature;
use App\Models\Consult;

class ServiceController extends Controller
{
    public function index()
    {
        $services = ComprehensiveService::orderBy('order')->get();

        // Fetch Why Choose Us - List items (Checkmarks)
        $whyChooseCheckpoints = WhyChooseUsFeature::where('type', 'checkpoint')
            ->orderBy('order', 'asc')
            ->get();

        $whyChooseStats = WhyChooseUsFeature::where('type', 'stat')
            ->orderBy('order', 'asc')
            ->get();

        $consults = Consult::latest()->get();

        return view("frontend.pages.services", compact("services", "whyChooseCheckpoints", "whyChooseStats", "consults"));
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'service' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        Consult::create($request->all());

        return redirect()->back()->with('success', 'Thank you for your message! We will contact you shortly.');
    }
}
