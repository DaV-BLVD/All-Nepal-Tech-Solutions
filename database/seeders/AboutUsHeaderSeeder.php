<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AboutUsHeader;

class AboutUsHeaderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AboutUsHeader::create([
            'title' => 'About Us',
            'subtitle' => 'Highly Tailored IT Design, Management & Support Services',
            'description' => 'All Nepal Tech Solutions (ANTS) stands at the forefront of technological innovation...',
            'features' => [
                ['icon' => 'fas fa-shield-halved', 'label' => 'Enterprise Security'],
                ['icon' => 'fas fa-cloud', 'label' => 'Cloud Solutions'],
                ['icon' => 'fas fa-network-wired', 'label' => 'IT Infrastructure'],
            ]
        ]);
    }
}
