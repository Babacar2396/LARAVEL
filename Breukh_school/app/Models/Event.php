<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model
{
    // use HasFactory;
    public function classe():HasMany
    {
        return $this->hasMany(Classe::class);
    }
    public function participants() :HasMany 
    {
        return $this->hasMany(Participant::class);
    }
}
