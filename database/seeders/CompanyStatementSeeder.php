<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CompanyStatement;

class CompanyStatementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CompanyStatement::create([
            'mission_text' => 'To deliver scalable, secure, and innovative IT services...',
            'mission_points' => ['Scalable Solutions', 'Enterprise-grade Security', 'Continuous Innovation'],
            'vision_text' => "To become Nepal's most trusted and innovative IT solutions partner...",
            'vision_points' => ['Industry Leadership', 'Digital Transformation Pioneer', 'Trusted Technology Partner'],
        ]);
    }
}
