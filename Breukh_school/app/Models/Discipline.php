<?php

namespace App\Models;
use App\Models\Classe;
use App\Models\Evaluation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Discipline extends Model
{
    use HasFactory;
    public function Discipline(): BelongsTo
    {
        return $this->belongsTo(Discipline::class);
    }
    public function Classe(): BelongsTo
    {
        return $this->belongsTo(Classe::class);
    }
    public function Evaluation(): BelongsTo
    {
        return $this->belongsTo(Evaluation::class);
    }
    public function AnnneScolaire(): BelongsTo
    {
        return $this->belongsTo(AnnneScolaire::class);
    }
    protected $fillable=[
        'libelle',
        'code',
    ];
}
