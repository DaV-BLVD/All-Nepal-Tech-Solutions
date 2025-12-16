<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        Service::insert([
            [
                'title' => 'Software Design',
                'icon' => 'fas fa-laptop-code',
                'description' => 'We provide responsive and functional software design worldwide.',
                'is_active' => true,
            ],
            [
                'title' => 'IT Management',
                'icon' => 'fas fa-server',
                'description' => 'Efficiently manage and transform data across servers.',
                'is_active' => true,
            ],
            [
                'title' => 'Data Security',
                'icon' => 'fas fa-shield-alt',
                'description' => 'Secure backups while keeping accessibility intact.',
                'is_active' => true,
            ],
        ]);
    }
}
