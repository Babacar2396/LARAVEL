<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EleveResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
         return[
        
            'Nom' => $this->Nom,
            'Prenom' => $this->Prenom,
            'Naissance' => $this->Naissance,
            'Lieu_Naissance' => $this->Lieu_Naissance,
            'Sexe' => $this->Sexe,
            'Profil' => $this->Profil,
        ];
    
       
    }
}
