<?php

namespace App\Http\Controllers;
use App\Models\Parent;
use Illuminate\Http\Request;

class ParentController extends Controller
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
    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'eleve_id' => 'required',
            // 'parent_id' => 'required',
            'email' => 'required|email',
        ]);

        $parent = Parent::create($validatedData);
        $parent->save();

        return response()->json([
            'message' => 'Parent créé avec succès',
            'data' => $parent
        ], 201);
    }
}

   