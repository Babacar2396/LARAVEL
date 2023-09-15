<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;
    protected $fillable = ['inscription_id', 'semestre_actif_id', 'classe_discipline_id', 'eleve_id', 'anne_scolaires_id','evaluations_id','note'];

    public function classeDiscipline()
    {
        return $this->belongsTo(ClasseDiscipline::class, 'classe_discipline_id');
    }

    public function eleve()
    {
        return $this->belongsTo(Eleve::class, 'eleve_id');
    }
}
