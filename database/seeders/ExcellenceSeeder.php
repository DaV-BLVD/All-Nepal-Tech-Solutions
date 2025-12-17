<?php

namespace Database\Seeders;


use App\Models\Excellence;
use Illuminate\Database\Seeder;


class ExcellenceSeeder extends Seeder
{
    public function run(): void
    {
        Excellence::insert([
            [
                'title' => 'Data Management Systems',
                'image' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f',
                'description' => 'Clean-coded websites based on customer needs.',
                'is_active' => true,
            ],
            [
                'title' => 'Efficient Database Security',
                'image' => 'https://images.unsplash.com/photo-1550751827-4bd374c3f58b',
                'description' => 'Secure systems based on global security standards.',
                'is_active' => true,
            ],
            [
                'title' => 'Reliable Multi-function Technology',
                'image' => 'https://images.unsplash.com/photo-1451187580459-43490279c0fa',
                'description' => 'Versatile solutions following modern trends.',
                'is_active' => true,
            ],
        ]);
    }
}