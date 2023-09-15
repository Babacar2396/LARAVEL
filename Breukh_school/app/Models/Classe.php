<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];
    
    public function inscriptions()
    {
        return $this->hasMany(Inscription::class, 'classe_id');
    }
    public function participants() :HasMany 
    {
        return $this->hasMany(Participant::class);
    }
}