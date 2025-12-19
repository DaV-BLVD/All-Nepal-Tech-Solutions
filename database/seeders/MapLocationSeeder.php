<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MapLocation;

class MapLocationSeeder extends Seeder
{
    public function run(): void
    {
        MapLocation::create([
            'title' => 'Beyondtech Nepal Pvt. Ltd.',
            'iframe_url' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3531.6546931919925!2d85.33179037524076!3d27.727945924583096!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb1957d4429403%3A0x2e8fb4f4cfe35919!2sBeyondtech%20Nepal%20Pvt.%20Ltd.!5e0!3m2!1sen!2snp!4v1765787237364!5m2!1sen!2snp',
            'order' => 1,
        ]);
    }
}
