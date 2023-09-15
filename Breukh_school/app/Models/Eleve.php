<?php

namespace App\Models; 
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;

class Eleve extends Model
{
    use HasFactory, Notifiable;
    protected $guarded = [
       'id'
    ];
    
    public function inscriptions()
    {
        return $this->hasMany(Inscription::class, 'classe_id');

    }
    public function note(): HasMany
    {
        return $this->hasMany(Note::class,'note_id');
    }
  
    protected $fillable = ['Nom', 'Prenom', 'Naissance', 'lieu_Naissance', 'Sexe', 'Profil'];
    
    function __construct(){
        $this->numero=$this->numero();
    }

    private function numero()
        {
            $lastId = DB::table('eleves')->orderBy('numero', 'desc')->pluck('numero')->first();
            $numero = $lastId + 1;
            $elevesAbandonnes = DB::table('eleves')->where('etat', 0)->orderBy('numero')->get();
            
            foreach ($elevesAbandonnes as $eleveAbandonne) {
                $elevesNonAbandonnes = DB::table('eleves')->where('numero', $eleveAbandonne->numero)->where('etat', 1)->count();
                if ($elevesNonAbandonnes == 0) {
                    $numero = $eleveAbandonne->numero;
                    return $numero;

                }
            }
            
            return $numero;
        }
//    private function numero()
//     {
//         $lastId = DB::table('eleves')->orderBy('numero', 'desc')->pluck('numero')->first();
//         $numero = $lastId + 1;
//         $EleveAbandon = DB::table('eleves')->where('etat', 0)->orderBy('numero', 'desc')->first();
        
//         if ($EleveAbandon) {
//             $EleveNonAbandons = DB::table('eleves')->where('numero', $EleveAbandon->numero)->where('etat', 1)->count();
//             if ($EleveNonAbandons == 0) {
//                 $numero = $EleveAbandon->numero;
//                 return $numero;
//             }
//         }
        
//         return $numero;
//     }  
    




}
 





























