<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CoreValue;

class CoreValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CoreValue::create([
            'icon' => 'fas fa-lightbulb',
            'title' => 'Innovation',
            'description' => 'We constantly push boundaries and embrace new technologies to deliver cutting-edge solutions.',
            'sort_order' => 1
        ]);
    }
}
