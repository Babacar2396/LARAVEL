<?php

namespace App\Http\Controllers;

use App\Http\Resources\NiveauxResource;
use App\Traits\JoinQueryParams;
use Illuminate\Http\Request;
use App\Models\Classe;
use App\Models\Niveaux;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View;

class NiveauxController extends Controller
{
    use JoinQueryParams;
    public function index(Request $request)
    {
        $join = $request->query('join');

        $actions = [
            'classes' => function () {
                // Récupérer les niveaux avec les classes associées
                return Niveaux::with('classes')->get();
            },
            null => function () {
                // Récupérer uniquement les niveaux
                return Niveaux::all();
                
            },
        ];

        if (isset($actions[$join])) {
            $niveaux = $actions[$join]();
        } else {
            // Afficher la page d'erreur 404
            // return Response::view('404', [], 404);
            return Niveaux::all();
        }

        return response()->json([
            'Niveaux' => $niveaux
        ]);
    }
    public function find (Niveaux $niveau){
        // $niveau = niveaux::find($niveau);
        $this -> test();
       
      return $niveau->load('classes');  
           
    }     
}

