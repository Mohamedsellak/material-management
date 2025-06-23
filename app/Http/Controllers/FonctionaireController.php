<?php

namespace App\Http\Controllers;

use App\Models\Fonctionaire;
use App\Models\Departement;
use Illuminate\Http\Request;

class FonctionaireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Fonctionaire::query();

        if (request('search')) {
            $searchTerm = request('search');
            $query->where(function($q) use ($searchTerm) {
                $q->where('nom', 'like', '%' . $searchTerm . '%')
                  ->orWhere('prenom', 'like', '%' . $searchTerm . '%')
                  ->orWhere('email', 'like', '%' . $searchTerm . '%');
            });
        }

        if (request('department')) {
            $query->where('departement_id', request('department'));
        }

        $departements = Departement::all();

        return view('fonctionaires.index', [
            'fonctionaires' => $query->latest()->paginate(8)->withQueryString(),
            'departements' => $departements,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departements = Departement::all();
        return view('fonctionaires.create', compact('departements'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'nom' => 'required|string|min:3|max:20',
            'prenom' => 'required|string|min:3|max:20',
            'email' => 'required|email',
            'telephone' => 'nullable|numeric',
            'departement_id' => 'required|numeric|exists:departements,id',
        ]);

        Fonctionaire::create($request->all());

        return redirect()->route('fonctionaires.index')
            ->with('success', 'Fonctionaire created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Fonctionaire $fonctionaire)
    {
        return view('fonctionaires.show', ['fonctionnaire'=>$fonctionaire]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fonctionaire $fonctionaire)
    {
        $departements = Departement::all();
        return view('fonctionaires.edit', compact('fonctionaire', 'departements'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fonctionaire $fonctionaire)
    {
        $request->validate([
            'nom' => 'required|string|min:3|max:20',
            'prenom' => 'required|string|min:3|max:20',
            'email' => 'required|email',
            'telephone' => 'nullable|numeric',
            'departement_id' => 'required|numeric|exists:departements,id',
        ]);

        $fonctionaire->update($request->all());

        return redirect()->route('fonctionaires.index')
            ->with('success', 'Fonctionaire updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fonctionaire $fonctionaire)
    {
        $fonctionaire->delete();

        return redirect()->route('fonctionaires.index')
            ->with('success', 'Fonctionaire deleted successfully');
    }
}
