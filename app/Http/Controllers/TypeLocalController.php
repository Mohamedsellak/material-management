<?php

namespace App\Http\Controllers;

use App\Models\TypeLocal;
use Illuminate\Http\Request;

class TypeLocalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = TypeLocal::query();
        
        if ($request->has('search')) {
            $search = $request->get('search');
            $query->where('name', 'like', "%{$search}%");
        }
        
        $typeLocals = $query->paginate(8)->withQueryString();
        return view('type-locals.index', compact('typeLocals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('type-locals.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|min:3',
        ]);
        TypeLocal::create($request->all());
        return to_route('type-locals.index')->with('success', 'Type de local créé avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(TypeLocal $typeLocal)
    {
        return view('type-locals.show', compact('typeLocal'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TypeLocal $typeLocal)
    {
        return view('type-locals.edit', compact('typeLocal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TypeLocal $typeLocal)
    {
        $request->validate([
            'name' => 'required|string|max:255|min:3',
        ]);
        $typeLocal->update($request->all());
        return to_route('type-locals.index')->with('success', 'Type de local modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TypeLocal $typeLocal)
    {
        $typeLocal->delete();
        return to_route('type-locals.index')->with('success', 'Type de local supprimé avec succès');
    }
}
