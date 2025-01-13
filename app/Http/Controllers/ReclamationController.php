<?php

namespace App\Http\Controllers;

use App\Models\Reclamation;
use Illuminate\Http\Request;
use App\Models\Local;

class ReclamationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reclamations = Reclamation::latest()->paginate(3);
        return view("reclamations.index", compact('reclamations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $locals = Local::all();
        return view("reclamations.create", compact('locals'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'local_id' => 'required',
            'status' => 'required',
            'commentaire' => 'nullable'
        ]);

        $validated['user_id'] = session('user')->id;
        
        Reclamation::create($validated);

        return redirect()->route('reclamations.index')->with('success', 'Reclamation créée avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(Reclamation $reclamation)
    {
        return view("reclamations.show", compact('reclamation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reclamation $reclamation)
    {   
        // $departements = Departement::all();
        $locals = Local::all();
        return view("reclamations.edit", compact('reclamation', 'locals'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reclamation $reclamation)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'local_id' => 'required|exists:locals,id',
            'status' => 'required|in:en attente,en cours,resolue',
            'commentaire' => 'nullable'
        ]);

        $validated['user_id'] = session('user')->id;
            
        $reclamation->update($validated);
        return redirect()->route('reclamations.index')->with('success', 'Reclamation modifiée avec succès');
    }


    public function editStatus(Reclamation $reclamation)
    {
        return view("reclamations.editStatus", compact('reclamation'));
    }

    /**
     * Update the status of the specified resource.
     */
    public function updateStatus(Request $request, Reclamation $reclamation)
    {   
        $validated = $request->validate([
            'status' => 'required|in:en attente,en cours,resolue',
            'commentaire' => 'nullable',
        ]);
        $reclamation->update($validated);
        return redirect()->route('reclamations.index')->with('success', 'Reclamation modifiée avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reclamation $reclamation)
    {
        $reclamation->delete();
        return redirect()->route('reclamations.index')->with('success', 'Reclamation supprimée avec succès');
    }
}
