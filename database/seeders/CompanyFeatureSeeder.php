<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CompanyFeature;

class CompanyFeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CompanyFeature::insert([
            [
                'title' => 'How we can help your business?',
                'subtitle' => 'Discover our tailored strategies.',
                'is_active' => true,
            ],
            [
                'title' => 'Why become our partner?',
                'subtitle' => 'Growth, support, and innovation.',
                'is_active' => true,
            ],
        ]);
    }
}
