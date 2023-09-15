<?php

namespace Database\Seeders;

use App\Models\Evaluation;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EvaluationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $evaluation =
            [
                ['libelle' => 'ressource'],
                ['libelle' => 'composition']
            ];
        Evaluation::insert($evaluation);
    }
}
