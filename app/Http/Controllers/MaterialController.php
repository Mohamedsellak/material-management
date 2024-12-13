<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\TypeMaterial;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materials = Material::paginate(10);
        return view('materials.index', compact('materials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $typeMaterials = TypeMaterial::all();
        return view('materials.create', compact('typeMaterials'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:2|max:255',
            'description' => 'required|string|min:2|max:255',
            'quantity' => 'required|numeric|min:1',
            'type_material_id' => 'required|exists:type_materials,id',
        ]);

        Material::create($request->all());

        return redirect()->route('materials.index')
            ->with('success', 'Material created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Material $material)
    {
        return view('materials.show', compact('material'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Material $material)
    {
        $typeMaterials = TypeMaterial::all();
        return view('materials.edit', compact('material', 'typeMaterials'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Material $material)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:255',
            'description' => 'required|string|min:3|max:255',
            'quantity' => 'required|numeric|min:1',
            'type_material_id' => 'required|exists:type_materials,id',
        ]);

        $material->update($request->all());

        return redirect()->route('materials.index')
            ->with('success', 'Material updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Material $material)
    {
        $material->delete();

        return redirect()->route('materials.index')
            ->with('success', 'Material deleted successfully');
    }
}
