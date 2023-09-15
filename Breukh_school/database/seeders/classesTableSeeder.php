<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class classesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $classes = [
            ['libelle' => 'CI', 'niveaux_id' => '1'],
            ['libelle' => 'CP', 'niveaux_id' => '1'],
            ['libelle' => 'CE1', 'niveaux_id' => '1'],
            ['libelle' => 'CE2', 'niveaux_id' => '1'],
            ['libelle' => 'CM1', 'niveaux_id' => '1'],
            ['libelle' => 'CM2', 'niveaux_id' => '1'],
            ['libelle' => '6 ème', 'niveaux_id' => '2'],
            ['libelle' => '5 ème', 'niveaux_id' => '2'],
            ['libelle' => '4 ème', 'niveaux_id' => '2'],
            ['libelle' => '3 ème', 'niveaux_id' => '2'],
            ['libelle' => 'Sécond', 'niveaux_id' => '3'],
            ['libelle' => 'Prémière', 'niveaux_id' => '3'],
            ['libelle' => 'Terminale', 'niveaux_id' => '3'],
        ];
        // \App\Models\classes::insert($classes);
        DB::table('classes')->insert($classes);

        
    }
}
