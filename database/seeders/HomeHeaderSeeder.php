<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\HomeHeader;

class HomeHeaderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HomeHeader::create([
            'badge' => 'IT Design & Consulting',
            'title' => 'Facilitate All Local',
            'title_highlight' => 'IT-related Service',
            'description' => 'Highly Tailored IT Design, Management & Support Services for your business growth and security.',
            'button_text' => 'Get Details',
            'button_link' => '#',
        ]);
    }
}
