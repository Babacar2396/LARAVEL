<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NoteResource extends JsonResource
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
            "note"=>$this->valeur,
            "inscription"=>new InscriptionResource($this->inscription),
            "ClasseDiscipline"=>$this->classe_discipline_id
        ];
    }
}