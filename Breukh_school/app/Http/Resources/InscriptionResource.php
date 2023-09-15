<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InscriptionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
    
        
            //    'eleve'=>new EleveResource($this->eleve),
            //    'classe'=>new classesResource($this->classe),
            //    'annee_scolaire'=>new AnneeScolaireResource($this->annee_scolaire),
            return [
                'date'  => $this->date,
                'eleve' => $this->eleve,
                'anneeScolaire' => $this->anneeScolaire,
                'classe'  => new ClasseResource($this->classe)
            ];
            
        
    }
}
