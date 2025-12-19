<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ContactCard;

class ContactCardSeeder extends Seeder
{
    public function run(): void
    {
        $cards = [
            [
                'title' => 'Our Office',
                'icon' => 'fas fa-map-marker-alt',
                'line1' => 'Baluwatar, Kathmandu',
                'line2' => 'xxxx',
                'order' => 1,
            ],
            [
                'title' => 'Phone Number',
                'icon' => 'fas fa-phone-alt',
                'line1' => '+977 xx-xxxxxxx',
                'line2' => '+977 xx-xxxxxxx',
                'order' => 2,
            ],
            [
                'title' => 'Email Address',
                'icon' => 'fas fa-envelope',
                'line1' => 'info@allnepaltech.com',
                'line2' => 'support@allnepaltech.com',
                'order' => 3,
            ],
            [
                'title' => 'Working Hours',
                'icon' => 'fas fa-clock',
                'line1' => 'Sun - Fri: 9AM - 6PM',
                'line2' => 'Saturday: Closed',
                'order' => 4,
            ],
        ];

        foreach ($cards as $card) {
            ContactCard::create($card);
        }
    }
}
