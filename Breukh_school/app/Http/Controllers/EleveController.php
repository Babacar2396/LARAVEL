<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Eleve;
use App\Models\Classe;
use App\Models\Inscription;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\InscriptionResource;

class EleveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($classe)
    {
       return InscriptionResource::collection(Inscription::where('classe_id',$classe)->get());
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validator = Validator::make($request->all(), [
        'Nom' => 'required',
        'Prenom' => 'required',
        'Naissance' => "sometimes|date|before: -5years",
        'Lieu_Naissance' => 'required',
        'Sexe' => 'required',
        'Profil' => 'required',
        
    ]);



    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }
     else {
        $eleve = Eleve::create([
            'Nom' => $request->input("Nom"),
            'Prenom' => $request->input("Prenom"),
            'Naissance' => $request->input("Naissance"),
            'lieu_Naissance' => $request->input("Lieu_Naissance"),
            'Sexe' => $request->input("Sexe"),
            'Profil' => $request->input("Profil"),

        ]);


       // Ajoutez l'élève à la table "inscription"
       $inscription=Inscription::create([
           'eleve_id' => $eleve->id,
           'Date_Inscription' => date('Y-m-d'), 
           'classe_id' => $request->classe_id, 
           'annee_scolaire_id' => 1,
    
]);

        // return response()->json($eleve, 200);
        return new InscriptionResource($inscription);
    }
}
public function updateSortie(Request $request)
{
    foreach ($request->input('eleves') as $eleveData)
    {
        $eleve = Eleve::findOrFail($eleveData);
        $eleve->etat = $request->input('etat');
        $eleve->save();
    }

    return response()->json(['message' => 'Les états des élèves ont été mis à jour avec succès.']);

    


// $eleveIds = collect($request->input('eleves'))->pluck('id')->toArray();

// Eleve::whereIn('id', $eleveIds)->update(['etat' => $request->input('etat')]);

// return response()->json(['message' => 'Les états des élèves ont été mis à jour avec succès.']);

}

    /**
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
