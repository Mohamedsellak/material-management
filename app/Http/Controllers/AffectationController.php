<?php

namespace App\Http\Controllers;

use App\Models\Affectation;
use App\Models\Etat;
use App\Models\Local;
use App\Models\CommandLine;
use Illuminate\Http\Request;
use App\Models\Departement;
use PDF;
use App\Exports\AffectationsExport;
use Maatwebsite\Excel\Facades\Excel;
class AffectationController extends Controller
{
    public function index()
    {
        $search = request()->search ?? null;
        $etat = request()->etat ?? null;
        $local = request()->local ?? null;

        $query = Affectation::query();
        // $query->where('etat_id', '!=', 3); different from casse

        if($search){
            $query->where('numero_inventaire', $search);
        }
        if($etat){
            $query->where('etat_id', $etat);
        }
        if($local){
            $query->where('local_id', $local);
        }

        $affectations = $query->paginate(8);
        
        $etats = Etat::all();
        $locals = Local::all();
        return view('affectations.index', compact('affectations', 'etats', 'locals'));
    }

    public function create()
    {
        $commandLine = request()->commandLine ?? null;
        $commandLine = CommandLine::findOrFail($commandLine);
        $etats = Etat::all();
        $locals = Local::all();
        return view('affectations.create', compact('commandLine', 'etats', 'locals'));
    }

    public function store(Request $request)
    {   
        $validated = $request->validate([
            'numero_inventaire.*' => 'required|integer|unique:affectations,numero_inventaire',
            'etat_id.*' => 'required|exists:etats,id',
            'local_id.*' => 'required|exists:locals,id',
            'command_line_id' => 'required|exists:command_lines,id',
        ]);

        $commandLine = CommandLine::findOrFail($request->command_line_id);
        $count = count($request->etat_id);

        for ($i = 0; $i < $count; $i++) {
            Affectation::create([
                'numero_inventaire' => $request->numero_inventaire[$i],
                'etat_id' => $request->etat_id[$i],
                'local_id' => $request->local_id[$i],
                'command_line_id' => $request->command_line_id,
            ]);
        }

        return redirect()->route('affectations.index')
            ->with('success', 'Affectations créées avec succès.');
    }

    public function edit(Affectation $affectation)
    {
        $etats = Etat::all();
        $locals = Local::all();
        $departements = Departement::all();
        return view('affectations.edit', compact('affectation', 'etats', 'locals', 'departements'));
    }

    public function update(Request $request, Affectation $affectation)
    {
        $validated = $request->validate([
            'numero_inventaire' => 'required|integer|unique:affectations,numero_inventaire,' . $affectation->id,
            'etat_id' => 'required|exists:etats,id',
            'local_id' => 'required|exists:locals,id',
        ]);

        $affectation->update($request->all());

        return redirect()->route('affectations.index')
            ->with('success', 'Affectation mise à jour avec succès.');
    }

    public function destroy(Affectation $affectation)
    {
        $affectation->delete();

        return redirect()->route('affectations.index')
            ->with('success', 'Affectation supprimée avec succès.');
    }

    public function show(Affectation $affectation)
    {
        return view('affectations.show', compact('affectation'));
    }

    public function generatePDF(Affectation $affectation)
    {
        $pdf = PDF::loadView('affectations.pdf', compact('affectation'));
        return $pdf->download('affectation-' . $affectation->numero_inventaire . '.pdf');
    }


    public function casse()
    {
        // dd('ok');
        $etat = Etat::where('name', 'Casse')->first();
        if($etat){
            $affectations = Affectation::where('etat_id', $etat->id)->get();
        }else{
            $affectations = [];
        }

        return view('affectations.casse', compact('affectations'));
    }
}
