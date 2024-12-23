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
        $query = Affectation::with(['etat', 'local', 'commandLine']);

        // Search by numero_inventaire
        if (request('search')) {
            $query->where('numero_inventaire', 'like', '%' . request('search') . '%');
        }

        // Filter by etat
        if (request('etat')) {
            $query->where('etat_id', request('etat'));
        }

        // Filter by local
        if (request('local')) {
            $query->where('local_id', request('local'));
        }

        $affectations = $query->latest()->paginate(10)->withQueryString();
        
        // Get all etats and locals for the filter dropdowns
        $etats = Etat::all();
        $locals = Local::all();

        return view('affectations.index', compact('affectations', 'etats', 'locals'));
    }

    public function create()
    {   
        $etats = Etat::all();
        $locals = Local::all();
        
        $command_line_id = request('command_line_id') ?? null;
        
        if ($command_line_id) {
            $commandLine = CommandLine::find($command_line_id);
            if ($commandLine) {
                return view('affectations.create', compact('commandLine', 'etats', 'locals'));
            }
        }
        
        $commandLines = CommandLine::all();
        return view('affectations.create', compact('etats', 'locals', 'commandLines'));
    }

    public function store(Request $request)
    {   
        // dd($request->all());
        $validated = $request->validate([
            'etat_id' => 'required|exists:etats,id',
            'local_id' => 'required|exists:locals,id',
            'command_line_id' => 'required|exists:command_lines,id',
        ]);

        Affectation::create($request->all());

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
            'etat_id' => 'required|exists:etats,id',
            'local_id' => 'required|exists:locals,id',
            'command_line_id' => 'required|exists:command_lines,id',
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

    public function export() 
    {
        return Excel::download(new AffectationsExport, 'affectations.xlsx');
    }
}
