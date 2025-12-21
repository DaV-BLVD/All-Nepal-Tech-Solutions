<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ServiceHeader;

class ServiceHeaderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ServiceHeader::create([
            'title' => 'World-Class',
            'highlighted_text' => 'Tech Solutions',
            'description' => 'Empowering businesses across Nepal with cutting-edge technology. From robust security systems to seamless cloud integration, we are your partners in digital transformation.',
            'bg_icon' => 'fas fa-cogs',
            'btn_primary_text' => 'Explore Services',
            'btn_primary_link' => '#services-grid',
            'btn_secondary_text' => 'Contact Us',
            'btn_secondary_link' => '#contact',
        ]);
    }
}
