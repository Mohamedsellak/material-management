<?php

namespace App\Http\Controllers;

use App\Models\Affectation;
use App\Models\Etat;
use App\Models\Local;
use App\Models\CommandLine;
use Illuminate\Http\Request;
use PDF;
use App\Exports\AffectationsExport;
use Maatwebsite\Excel\Facades\Excel;

class AffectationController extends Controller
{
    public function index()
    {
        $affectations = Affectation::with(['etat', 'local', 'commandLine'])->get();
        return view('affectations.index', compact('affectations'));
    }

    public function create()
    {
        $etats = Etat::all();
        $locals = Local::all();
        $commandLines = CommandLine::all();
        return view('affectations.create', compact('etats', 'locals', 'commandLines'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'numero_inventaire' => 'required|integer|unique:affectations',
            'etat_id' => 'required|exists:etats,id',
            'local_id' => 'required|exists:locals,id',
            'command_line_id' => 'required|exists:command_lines,id',
        ]);

        Affectation::create($validated);

        return redirect()->route('affectations.index')
            ->with('success', 'Affectation créée avec succès.');
    }

    public function edit(Affectation $affectation)
    {
        $etats = Etat::all();
        $locals = Local::all();
        $commandLines = CommandLine::all();
        return view('affectations.edit', compact('affectation', 'etats', 'locals', 'commandLines'));
    }

    public function update(Request $request, Affectation $affectation)
    {
        $validated = $request->validate([
            'numero_inventaire' => 'required|integer|unique:affectations,numero_inventaire,' . $affectation->id,
            'etat_id' => 'required|exists:etats,id',
            'local_id' => 'required|exists:locals,id',
            'command_line_id' => 'required|exists:command_lines,id',
        ]);

        $affectation->update($validated);

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

    public function export() 
    {
        return Excel::download(new AffectationsExport, 'affectations.xlsx');
    }
}