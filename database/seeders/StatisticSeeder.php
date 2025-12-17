<?php

namespace Database\Seeders;

use App\Models\Statistic;
use Illuminate\Database\Seeder;

class StatisticSeeder extends Seeder
{
    public function run(): void
    {
        Statistic::insert([
            ['title' => 'Successfully Worked with', 'value' => 100, 'suffix' => 'Happy Clients'],
            ['title' => 'Successfully Completed', 'value' => 40, 'suffix' => 'Finished Projects'],
            ['title' => 'Recruited More than', 'value' => 300, 'suffix' => 'Skilled Experts'],
            ['title' => 'Services Provided', 'value' => 150, 'suffix' => 'Quality Certified'],
        ]);
    }
}
