<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParentEleve extends Model
{
    // use HasFactory;
    protected $fillable = ['eleve_id','email'];
    protected $table = 'parent_eleves';
}
