<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProjectsHeader;

class ProjectsHeaderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProjectsHeader::create([
            'badge' => 'INNOVATION IN ACTION',
            'title' => 'Our Masterpieces',
            'description' => 'Explore how we transform complex challenges into elegant digital solutions. From cloud architecture to seamless mobile experiences.',
        ]);
    }
}
