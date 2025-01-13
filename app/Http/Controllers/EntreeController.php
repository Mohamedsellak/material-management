<?php

namespace App\Http\Controllers;

use App\Models\Entree;
use App\Models\Material;
use App\Models\Fournisseur;
use Illuminate\Http\Request;

class EntreeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $entrees = Entree::latest()->paginate(8);
        return view('entrees.index', compact('entrees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $materials = Material::all();
        $fournisseurs = Fournisseur::all();

        return view('entrees.create', compact('materials', 'fournisseurs'));}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'date' => 'required',
            'quantity' => 'required',
            'fournisseur_id' => 'required',
            'material_id' => 'required',
        ]);

        Entree::create($request->all());

        $material = Material::find($request->material_id);
        $material->quantity += $request->quantity;
        $material->save();

        return redirect()->route('entrees.index')
            ->with('success', 'Entree created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Entree $entree)
    {
        return view('entrees.show', compact('entree'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Entree $entree)
    {
        $fournisseurs = Fournisseur::all();
        $materials = Material::all();

        return view('entrees.edit', compact('entree', 'fournisseurs', 'materials'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Entree $entree)
    {
        $request->validate([
            'date' => 'required',
            'quantity' => 'required',
            'fournisseur_id' => 'required',
            'material_id' => 'required',
        ]);

        $material = Material::find($request->material_id);

        $oldQuantity = $entree->quantity;
        $material->quantity -= $oldQuantity;
        $material->quantity += $request->quantity;
        $material->save();

        $entree->update($request->all());

        return redirect()->route('entrees.index')
            ->with('success', 'Entree updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Entree $entree)
    {
        $material = Material::find($entree->material_id);
        $material->quantity -= $entree->quantity;
        $material->save();

        $entree->delete();

        return redirect()->route('entrees.index')
            ->with('success', 'Entree deleted successfully');
    }
}
