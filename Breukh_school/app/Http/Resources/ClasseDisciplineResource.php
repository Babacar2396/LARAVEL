<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ClasseDisciplineResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            "valeur"                => $this->valeur,
            "discipline"            => $this->discipline,
            "anneeScolaire"         => $this->anneeScolaire,
            "semestre"              => $this->semestre,
            "evaluation"            => $this->evaluation,
            "classe"                => $this->classe
    ];
    }
}
