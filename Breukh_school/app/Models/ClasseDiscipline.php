<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ClasseDiscipline extends Model
{
    use HasFactory;
    public function DisciplineClasse(): HasMany
    {
        return $this->hasMany(DisciplineClasse::class);
    }
    public function note(): BelongsTo
    {
        return $this->belongsTo(Note::class,'note_id');
    }

    protected $fillable=[
        'discipline_id',
        'classe_id',
        'annee_scolaire_id',
        'evaluation_id',
        'noteMax'
        
    ];
}
