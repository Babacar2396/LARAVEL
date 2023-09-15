<?php

namespace Database\Seeders;
use App\Models\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class EvenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Récupérer l'ID de l'utilisateur à associer aux événements
    $user = User::first(); // Récupérer le premier utilisateur existant, vous pouvez ajuster cette logique selon vos besoins

    if ($user) {
        // Créer le premier événement associé à l'utilisateur
        Event::create([
            'user_id' => $user->id,
            'libelle' => 'Fosco',
            'date' => '2023-07-15',
            'description' => 'Description de Fosco',
        ]);

        // Créer le deuxième événement associé à l'utilisateur
        Event::create([
            'user_id' => $user->id,
            'libelle' => 'Graduation',
            'date' => '2023-07-20',
            'description' => 'Description de Graduation',
        ]);
    }
    }
}
