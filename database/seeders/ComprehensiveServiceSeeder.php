<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ComprehensiveServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            ['title' => 'Advanced Security', 'icon_class' => 'fas fa-shield-alt', 'description' => 'Protect your assets with our state-of-the-art security solutions including CCTV surveillance, biometric access control, and cybersecurity protocols tailored for businesses.'],
            ['title' => 'POS Solutions', 'icon_class' => 'fas fa-cash-register', 'description' => 'Streamline your sales with our robust Point of Sale systems. Features include inventory management, real-time reporting, and multi-store support for retail and hospitality.'],
            ['title' => 'Cloud Facilities', 'icon_class' => 'fas fa-cloud', 'description' => 'Scalable cloud infrastructure for storage, hosting, and computing. We assist with cloud migration, hybrid setups, and ensuring 99.9% uptime for your critical data.'],
            ['title' => 'Web Development', 'icon_class' => 'fas fa-code', 'description' => 'Custom websites and web applications built with modern technologies. From e-commerce platforms to corporate portfolios, we create responsive and engaging digital experiences.'],
            ['title' => 'Network Solutions', 'icon_class' => 'fas fa-network-wired', 'description' => 'Complete networking infrastructure setup including structured cabling, router configuration, VPN setup, and ongoing network maintenance for office environments.'],
            ['title' => 'IT Consulting', 'icon_class' => 'fas fa-headset', 'description' => 'Expert advice to align your technology strategy with business goals. We analyze your current infrastructure and recommend improvements for efficiency and cost reduction.'],
        ];

        foreach ($services as $service) {
            \App\Models\ComprehensiveService::create($service);
        }
    }
}
