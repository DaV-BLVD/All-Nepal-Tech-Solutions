<?php

namespace Database\Seeders;

use App\Models\WhyChooseUsFeature;
use Illuminate\Database\Seeder;

class WhyChooseUsFeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Checkpoint Features (The List with Checkmarks)
        $checkpoints = [
            ['title' => '24/7 Technical Support Team', 'type' => 'checkpoint', 'order' => 1],
            ['title' => 'Customized Solutions for Every Business Size', 'type' => 'checkpoint', 'order' => 2],
            ['title' => 'Experienced & Certified Professionals', 'type' => 'checkpoint', 'order' => 3],
            ['title' => 'Cost-Effective Implementation', 'type' => 'checkpoint', 'order' => 4],
        ];

        // 2. Statistics Features (The Translucent Cards)
        $stats = [
            ['title' => '500+', 'subtitle' => 'Happy Clients', 'type' => 'stat', 'order' => 1],
            ['title' => '99%', 'subtitle' => 'Satisfaction Rate', 'type' => 'stat', 'order' => 2],
            ['title' => '10+', 'subtitle' => 'Years Experience', 'type' => 'stat', 'order' => 3],
            ['title' => '24/7', 'subtitle' => 'Support', 'type' => 'stat', 'order' => 4],
        ];

        // Merge and Insert
        foreach (array_merge($checkpoints, $stats) as $feature) {
            WhyChooseUsFeature::create($feature);
        }
    }
}