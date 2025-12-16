<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CompanySection;

class CompanySectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CompanySection::create([
            'small_title' => 'Our company',
            'main_title' => 'We’ve been thriving in',
            'highlight_title' => 'since past few years',
            'description' => 'We are specialized in technological and IT-related services...',
            'button_text' => 'Join us now',
            'button_link' => '#',
        ]);
    }
}
