<?php

namespace App\Http\Controllers;
use App\Models\Note;
use App\Models\Eleve;
use App\Models\Classe;
use App\Models\Discipline;
use App\Models\Evaluation;
use App\Models\Inscription;
use Illuminate\Http\Request;
use App\Models\ClasseDiscipline;
use Illuminate\Routing\Controller;
use App\Http\Resources\NoteResource;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\InscriptionResource;
use App\Http\Controllers\MaxNote;

class NoteController extends Controller
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
    public function store(
        Request $request,
        Classe $classe,
        Discipline $discipline,
        Evaluation $evaluation
    ) {
        $validatedData = $request->input('notes');

        foreach ($validatedData as $v) {

            $validator = Validator::make($v, [
                'eleves_id' => 'required',
                'note' => 'required|numeric',
            ]);

            if ($validator->fails()) return $validator->errors();
            else {
                $inscription=Inscription::where('eleve_id', $v['eleves_id'])
                ->where('classe_id', $classe->id)->first();

                $classeDiscipline = ClasseDiscipline::where('classe_id', $classe->id)
                ->where('discipline_id', $discipline->id)->first();

                $note = Note::create([
                    'inscription_id' => $inscription->id,
                    'classe_discipline_id' => $classeDiscipline->id,
                    'note' => $v['note'],
                    'semestre_actif_id' => 1
                ]);
            }

            return response()->json(['message' => 'Note created successfully', 'note' => $note], 201);
        }
    }
    public function getOut(Request $request)
    {
        $ids = $request->ids;
        // dd($ids);
        Eleve::whereIn('id',$ids)->update(['etat'=> 0]);
        return[
            'message'=>'bap'
        ];
    }

    public function insertNote(Request $request, $class_id, $discipline_id, $evaluation_id)
{
    $classeDiscipline = ClasseDiscipline::where([
        'classe_id' => $class_id,
        'discipline_id' => $discipline_id,
        'evaluation_id' => $evaluation_id,
        'semestre_id' => 1,
        'annee_scolaire_id' => 1
    ])->first();

    $max = $classeDiscipline->valeur;
    $notes = $request->datas;
    $les_notes = [];
    $invalid_notes = [];

    foreach ($notes as $note) {
        if ($note['note_value'] < 0 || $note['note_value'] > $max) {
            $invalid_notes[] = $note;
        } else {
            $les_notes[] = [
                'valeur' => $note['note_value'],
                'classe_discipline_id' => $classeDiscipline->id,
                'inscription_id' => $note['inscrip_id']
            ];
        }
    }

    $inserted = Note::insert($les_notes);

    return response()->json($invalid_notes);
}

public function AfficherNote(Request $request, $class_id, $discipline_id, $evaluation_id)
{
    $classeDiscipline = ClasseDiscipline::where([
        'classe_id' => $class_id,
        'discipline_id' => $discipline_id,
        'evaluation_id' => $evaluation_id,
        'annee_scolaire_id' => 1,
        'semestre_id' => 1
    ])->first();

    $notes = Note::where('classe_discipline_id', $classeDiscipline->id)->get();

    return NoteResource::collection($notes);
}

public function getNoteByDiscipline($classe, $discipline)
{
    $classeDisciplineIds = ClasseDiscipline::where([
        'classe_id' => $classe,
        'discipline_id' => $discipline,
        'annee_scolaire_id' => 1,
        'semestre_id' => 1
    ])->pluck('id');

    $notes = Note::whereIn('classe_discipline_id', $classeDisciplineIds)->get();
     $noteGroupedByInscriptionId = $notes->groupBy('inscription_id');

    $tabs = [];

    foreach ($noteGroupedByInscriptionId as $inscriptionId => $groupedNotes) {
        $eleve = Inscription::find($inscriptionId);

        if ($eleve) {
            $tab = [
                'eleve' => new InscriptionResource($eleve),
                'note' => NoteResource::collection($groupedNotes)
            ];
        } else {
            $tab = [
                'note' => NoteResource::collection($groupedNotes)
            ];
        }

        array_push($tabs, $tab);
    }

    return $tabs;
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
