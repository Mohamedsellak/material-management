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
        $query = Local::query();

        // Search filter
        if (request('search')) {
            $searchTerm = request('search');
            $query->where('name', 'like', '%' . $searchTerm . '%');
        }

        // Type filter
        if (request('type')) {
            $query->where('type_local_id', request('type'));
        }

        // Department filter
        if (request('department')) {
            $query->where('departement_id', request('department'));
        }

        // Get all type locals and departments for the filter dropdowns
        $typeLocals = TypeLocal::all();
        $departements = Departement::all();

        return view('locals.index', [
            'locals' => $query->latest()->paginate(8)->withQueryString(),
            'typeLocals' => $typeLocals,
            'departements' => $departements
        ]);
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

    /**
     * Get locals by department ID.
     */
    public function getByDepartment($departmentId)
    {
        $locals = Local::where('departement_id', $departmentId)->get();
        return response()->json($locals);
    }
}
