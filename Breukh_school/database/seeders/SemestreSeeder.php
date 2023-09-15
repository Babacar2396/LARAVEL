<?php

namespace Database\Seeders;

use App\Models\Semestre;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SemestreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $semestre=[
            [
                "libelle"=>"trimestre 1",
                "niveaux_id"=>"2"
            ],
             [
                "libelle"=>"trimestre 2",
                "niveaux_id"=>"2"
             ],
             [
                "libele"=>"trimestre 3",
                "niveaux_id"=>"2"
             ],
             [
                "libelle"=>"trimestre 1",
                "niveaux_id"=>"1"
             ],
             [
                "libelle"=>"trimestre 2",
                "niveaux_id"=>"1"
             ],
             [
                "libele"=>"trimestre 3",
                "niveaux_id"=>"1"
             ],
            
            ];
         Semestre::insert($semestre);

    }
}
