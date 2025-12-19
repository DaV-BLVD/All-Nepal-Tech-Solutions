<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SocialLink;

class SocialLinkSeeder extends Seeder
{
    public function run(): void
    {
        $links = [
            [
                'platform' => 'Twitter',
                'icon' => 'fab fa-twitter',
                'url' => 'https://twitter.com/yourhandle',
                'order' => 1,
            ],
            [
                'platform' => 'Facebook',
                'icon' => 'fab fa-facebook-f',
                'url' => 'https://facebook.com/yourpage',
                'order' => 2,
            ],
            [
                'platform' => 'Instagram',
                'icon' => 'fab fa-instagram',
                'url' => 'https://instagram.com/yourhandle',
                'order' => 3,
            ],
            [
                'platform' => 'LinkedIn',
                'icon' => 'fab fa-linkedin-in',
                'url' => 'https://linkedin.com/in/yourprofile',
                'order' => 4,
            ],
        ];

        foreach ($links as $link) {
            SocialLink::create($link);
        }
    }
}
