<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ContactSetting;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ContactSetting::create([
            'title' => 'Obtaining further information by making a contact with our experienced IT staffs.',
            'description' => 'We’re available for 8 hours a day! Contact us to require a detailed analysis and assessment of your plan.',
            'phone' => '01-4500062',
            'button_text' => 'Contact Us',
            'button_link' => '/contact'
        ]);
    }
}
