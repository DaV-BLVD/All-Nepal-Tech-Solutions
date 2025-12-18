<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        \App\Models\Projects::create([
            'title' => 'Cloud Migration',
            'category' => 'infrastructure',
            'description' => 'Successfully migrated enterprise data and applications to cloud platforms.',
            'icon_svg' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z"></path>',
            'icon_bg_color' => 'bg-blue-50',
            'link' => '#'
        ]);
        // Add others similarly...
    }
}
