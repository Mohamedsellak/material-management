<?php

namespace App\Http\Controllers;

use App\Models\Etat;
use Illuminate\Http\Request;

class EtatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $etats = Etat::paginate(10);
        return view('etats.index', compact('etats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('etats.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|min:3',
        ]);

        Etat::create($request->all());
        return to_route('etats.index')->with('success', 'Etat créé avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(etat $etat)
    {
        return view('etats.show', compact('etat'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(etat $etat)
    {
        return view('etats.edit', compact('etat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, etat $etat)
    {
        $request->validate([
            'name' => 'required|string|max:255|min:3',
        ]);
        $etat->update($request->all());
        return to_route('etats.index')->with('success', 'Etat modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(etat $etat)
    {
        $etat->delete();
        return to_route('etats.index')->with('success', 'Etat supprimé avec succès');
    }
}
