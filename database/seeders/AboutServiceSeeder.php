<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AboutService;

class AboutServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AboutService::create([
            'title' => 'Cloud & Infrastructure',
            'icon' => 'fas fa-cloud',
            'color_theme' => 'purple',
            'description' => 'Scalable cloud solutions and robust infrastructure services...',
            'features' => ['Cloud Migration', 'Hybrid Cloud Solutions', 'Optimization'],
        ]);
    }
}
