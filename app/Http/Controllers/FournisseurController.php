<?php

namespace App\Http\Controllers;

use App\Models\Fournisseur;
use Illuminate\Http\Request;

class FournisseurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fournisseurs = Fournisseur::paginate(10);
        return view('fournisseurs.index', compact('fournisseurs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('fournisseurs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|min:3',
            'adresse' => 'required|string|max:255|min:3',
            'telephone' => 'required|string|numeric',
            'email' => 'required|string|max:255|email',
        ]);
        Fournisseur::create($request->all());
        return to_route('fournisseurs.index')->with('success', 'Fournisseur créé avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(Fournisseur $fournisseur)
    {
        return view('fournisseurs.show', compact('fournisseur'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fournisseur $fournisseur)
    {
        return view('fournisseurs.edit', compact('fournisseur'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fournisseur $fournisseur)
    {
        $request->validate([
            'name' => 'required|string|max:255|min:3',
            'adresse' => 'required|string|max:255|min:3',
            'telephone' => 'required|string|max:255|min:3',
            'email' => 'required|string|max:255|min:3',
        ]);
        $fournisseur->update($request->all());
        return to_route('fournisseurs.index')->with('success', 'Fournisseur modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fournisseur $fournisseur)
    {
        $fournisseur->delete();
        return to_route('fournisseurs.index')->with('success', 'Fournisseur supprimé avec succès');
    }
}
