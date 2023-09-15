<?php

namespace App\Http\Controllers;
use App\Models\Classe;
use App\Models\Discipline;
use App\Models\Note;
use App\Models\Eleve;
use App\Models\Evaluation;
use Illuminate\Http\Request;
use App\Models\ClasseDiscipline;

class ClasseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,$classe)
    {
        // dd($classe);
        $classeDiscipline = ClasseDiscipline::create([
            'discipline_id' => $request->input("discipline"),
            'annee_scolaire_id' =>1,
            'classe_id' => $classe,
            'evaluation_id' => $request->input("evaluation"),
            'noteMax' => $request->input("noteMax")
        ]);

        return $classeDiscipline;


    }

    public function NotesDisc($classeId, $discId)
    {
        // Récupérer la classe et la discipline à partir des IDs
        $classe = Classe::findOrFail($classeId);
        $discipline = Discipline::findOrFail($discId);

        $classeDiscipline = ClasseDiscipline::where('classe_id', $classe->id)
        ->where('discipline_id',$discipline->id)
        ->first();

        // Récupérer les notes de la discipline pour la classe spécifiée
        $notes = Note::where('classe_id', $classe->id)
                     ->where('discipline_id', $discipline->id)
                     ->get();

        // Retourner les notes au format JSON
        return response()->json([
            'classe' => $classe,
            'discipline' => $discipline,
            'notes' => $notes,
        ]);
    }

    public function NotesClasse($classeId)
    {
        // Récupérer la classe à partir de l'ID
        $classe = Classe::findOrFail($classeId);

        // Récupérer les notes de la classe spécifiée
        $notes = Note::where('classe_id', $classe->id)->get();

        // Retourner les notes au format JSON
        return response()->json([
            'classe' => $classe,
            'notes' => $notes,
        ]);
    }

    public function NoteEleve($classeId, $eleveId)
    {
        // Récupérer la classe, l'élève et les notes à partir des IDs
        $classe = Classe::findOrFail($classeId);
        $eleve = Eleve::findOrFail($eleveId);
        $notes = Note::where('classe_id', $classe->id)
                     ->where('eleve_id', $eleve->id)
                     ->get();

        // Retourner les notes de l'élève au format JSON
        return response()->json([
            'classe' => $classe,
            'eleve' => $eleve,
            'notes' => $notes,
            
        ]);
    }

    public function updateNotes(Request $request, $classeId, $discId, $evaId, $eleId)
    {
        // Récupérer la classe, la discipline, l'évaluation et l'élève à partir des IDs
        $classe = Classe::findOrFail($classeId);
        $discipline = Discipline::findOrFail($discId);
        $evaluation = Evaluation::findOrFail($evaId);
        $eleve = Eleve::findOrFail($eleId);

        // Récupérer la note de l'élève pour l'évaluation spécifiée
        $note = Note::where('classe_id', $classe->id)
                    ->where('discipline_id', $discipline->id)
                    ->where('evaluation_id', $evaluation->id)
                    ->where('eleve_id', $eleve->id)
                    ->first();

        // Mettre à jour la note si elle existe, sinon créer une nouvelle note
        if ($note) {
            $note->valeur = $request->input('valeur');
            $note->save();
        } else {
            $note = new Note();
            $note->classe_id = $classe->id;
            $note->discipline_id = $discipline->id;
            $note->evaluation_id = $evaluation->id;
            $note->eleve_id = $eleve->id;
            $note->valeur = $request->input('valeur');
            $note->save();
        }

        // Retourner la note mise à jour au format JSON
        return response()->json([
            'classe' => $classe,
            'discipline' => $discipline,
            'evaluation' => $evaluation,
            'eleve' => $eleve,
            'note' => $note,
        ]);
    }

    /**
     * Display the specified resource.
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
