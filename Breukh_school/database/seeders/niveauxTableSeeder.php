<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class niveauxTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $niveaux=[
            ['libelle'=>'ELEMENTAIRE'],
            ['libelle'=>'MOYEN'],
            ['libelle'=>'SECONDAIRE'],
        ];

        DB::table('niveaux')->insert($niveaux);
    }  
    
}
