<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Milestone;

class MilestoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Milestone::create([
            'year' => '2018',
            'title' => 'The Beginning',
            'description' => 'ANTS was founded with a vision to bridge the technology gap in Nepal’s business sector.',
            'icon' => 'fas fa-rocket',
            'order' => 1
        ]);
    }
}
