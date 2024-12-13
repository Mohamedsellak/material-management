<?php

namespace App\Http\Controllers;

use App\Models\TypeMaterial;
use Illuminate\Http\Request;

class TypeMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $typeMaterials = TypeMaterial::paginate(10);
        return view('typeMaterials.index', compact('typeMaterials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('typeMaterials.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|min:3',
        ]);
        TypeMaterial::create($request->all());
        return to_route('typeMaterials.index')->with('success', 'Type de matériel créé avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(TypeMaterial $typeMaterial)
    {
        return view('typeMaterials.show', compact('typeMaterial'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TypeMaterial $typeMaterial)
    {
        return view('typeMaterials.edit', compact('typeMaterial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TypeMaterial $typeMaterial)
    {
        $request->validate([
            'name' => 'required|string|max:255|min:3',
        ]);
        $typeMaterial->update($request->all());
        return to_route('typeMaterials.index')->with('success', 'Type de matériel modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TypeMaterial $typeMaterial)
    {
        $typeMaterial->delete();
        return to_route('typeMaterials.index')->with('success', 'Type de matériel supprimé avec succès');
    }
}
