<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ContactHeader;

class ContactHeaderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ContactHeader::create([
            'title' => 'Get In Touch',
            'description' => "We'd love to hear from you! Whether you have a question about our services, pricing, or anything else, our team is ready to answer all your questions.",
            'support_text' => '24/7 Support Available',
            'support_icon' => 'fas fa-headset',
        ]);
    }
}
