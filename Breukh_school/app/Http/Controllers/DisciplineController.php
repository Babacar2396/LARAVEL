<?php

namespace App\Http\Controllers;

use App\Models\Discipline;
use Illuminate\Http\Request;
use App\Models\ClasseDiscipline;

class DisciplineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listediscipline = Discipline::all();
        return $listediscipline;
    }
    // public function getDisciplineByClasse(Request $request)
    // {
        
    //     $disciplines = [];
    //     $tableau = ClasseDiscipline::where("classe_id", $request->id)->get();
    //     for ($i=0; $i <count($tableau) ; $i++) { 
    //         # code...
    //         array_push($disciplines,Discipline::find($tableau));
    //     }
    //     return ["associations" => $tableau, "disc" => $disciplines];
    // }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // $request->validated($request->all());

        $discipline = Discipline::create([
            'libelle' => $request->libelle,
            'code' => $request->code
        ]);
        return $discipline;
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
