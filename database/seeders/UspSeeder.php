<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UspSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    // database/seeders/UspSeeder.php
    public function run()
    {
        $data = [
            ['title' => 'Highly Tailored IT Strategies', 'description' => 'Custom solutions designed specifically for your unique business requirements.'],
            ['title' => 'End-to-End Project Delivery', 'description' => 'Complete project management from conception to deployment and beyond.'],
            // ... add others here
        ];

        foreach ($data as $index => $item) {
            \App\Models\Usp::create($item + ['sort_order' => $index]);
        }
    }
}
