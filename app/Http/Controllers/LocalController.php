<?php

namespace App\Http\Controllers;

use App\Models\Local;
use Illuminate\Http\Request;
use App\Models\Departement;
use App\Models\TypeLocal;

class LocalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $locals = Local::all();
        return view('locals.index', compact('locals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $departements = Departement::all();
        $typeLocals = TypeLocal::all();
        return view('locals.create', compact('departements', 'typeLocals'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|string|max:255|min:3',
            'type_local_id' => 'required|exists:type_locals,id',
            'departement_id' => 'required|exists:departements,id',
        ]);

        $local = Local::create($request->all());
        return redirect()->route('locals.index')->with('success', 'Local créé avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(Local $local)
    {
        //
        return view('locals.show', compact('local'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Local $local)
    {
        //
        $departements = Departement::all();
        $typeLocals = TypeLocal::all();
        return view('locals.edit', compact('local', 'departements', 'typeLocals'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Local $local)
    {
        //
        $request->validate([
            'name' => 'required|string|max:255|min:3',
            'type_local_id' => 'required|exists:type_locals,id',
            'departement_id' => 'required|exists:departements,id',
        ]);
        $local->update($request->all());
        return redirect()->route('locals.index')->with('success', 'Local modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Local $local)
    {
        //
        $local->delete();
        return redirect()->route('locals.index')->with('success', 'Local supprimé avec succès');
    }
}
