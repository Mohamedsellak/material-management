<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reclamation;
use App\Models\Local;
use App\Models\Departement;

class FonctionnaireReclamationController extends Controller
{
    public function index()
    {
        $reclamations = Reclamation::where('user_id', session('user')->id)->latest()->get();
        return view('fonctionnaire-reclamations.index', compact('reclamations'));
    }

    public function create()
    {   
        $locals = Local::all();
        $departements = Departement::all();
        return view('fonctionnaire-reclamations.create', compact('locals', 'departements'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'local_id' => 'required|exists:locals,id',
        ]);

        Reclamation::create([
            'user_id' => session('user')->id,
            'local_id' => $request->local_id,
            'name' => $request->name,
            'description' => $request->description,
            'status' => 'en attente',
        ]);

        return redirect()->route('fonctionnaire-reclamations.index')
            ->with('success', 'Réclamation créée avec succès');
    }

    public function show(Reclamation $fonctionnaire_reclamation)
    {
        return view('fonctionnaire-reclamations.show', ['reclamation' => $fonctionnaire_reclamation]);
    }

    public function edit(Reclamation $fonctionnaire_reclamation)
    {
        $locals = Local::all();
        $departements = Departement::all(); 
        return view('fonctionnaire-reclamations.edit', [
            'reclamation' => $fonctionnaire_reclamation,
            'locals' => $locals,
            'departements' => $departements
        ]);
    }

    public function update(Request $request, Reclamation $fonctionnaire_reclamation)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'local_id' => 'required|exists:locals,id',
        ]);

        $fonctionnaire_reclamation->update($request->only(['name', 'description', 'local_id']));
        
        return redirect()->route('fonctionnaire-reclamations.index')
            ->with('success', 'Réclamation modifiée avec succès');
    }

    public function destroy(Reclamation $fonctionnaire_reclamation)
    {
        $fonctionnaire_reclamation->delete();
        return redirect()->route('fonctionnaire-reclamations.index')
            ->with('success', 'Réclamation supprimée avec succès');
    }
}
