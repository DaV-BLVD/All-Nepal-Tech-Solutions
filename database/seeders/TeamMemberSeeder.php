<?php

namespace Database\Seeders;


use App\Models\TeamMember;
use Illuminate\Database\Seeder;


class TeamMemberSeeder extends Seeder
{
    public function run(): void
    {
        TeamMember::insert([
            ['name' => 'John Doe', 'role' => 'Internal Networking', 'specialization' => 'IT Networking', 'company' => 'Shangrila Blu', 'image' => 'frontendimages/aboutusimages/ceo.jfif'],
            ['name' => 'Jane Smith', 'role' => 'System Admin', 'specialization' => 'Server Maintenance', 'company' => 'Shangrila Blu', 'image' => 'frontendimages/aboutusimages/ceo1.jfif'],
            ['name' => 'Alice Johnson', 'role' => 'Security', 'specialization' => 'Cyber Security', 'company' => 'Shangrila Blu', 'image' => 'frontendimages/aboutusimages/ceo2.jfif'],
            ['name' => 'Bob Williams', 'role' => 'Infrastructure', 'specialization' => 'Hardware Setup', 'company' => 'Shangrila Blu', 'image' => 'frontendimages/aboutusimages/ceo3.jfif'],
        ]);
    }
}