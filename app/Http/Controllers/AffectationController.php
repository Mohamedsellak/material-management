<?php

namespace App\Http\Controllers;

use App\Models\Affectation;
use App\Models\Etat;
use App\Models\Local;
use App\Models\CommandLine;
use App\Models\TypeMaterial;
use Illuminate\Http\Request;
use App\Models\Departement;
use PDF;
use App\Exports\AffectationsExport;
use Maatwebsite\Excel\Facades\Excel;
class AffectationController extends Controller
{
    public function index()
    {
        $numero_inventaire = request()->numero_inventaire ?? null;
        $etat = request()->etat ?? null;
        $local = request()->local ?? null;
        $fonctionnaire = request()->fonctionnaire ?? null;
        $type_material = request()->type_material ?? null;

        $etatCasse = Etat::where('name', 'casse')->first();

        $query = Affectation::with(['etat', 'local.departement', 'commandLine.command.fonctionaire', 'commandLine.material']);
        $query->where('etat_id', '!=', $etatCasse->id);

        if($numero_inventaire){
            $query->where('numero_inventaire', 'LIKE', "%{$numero_inventaire}%");
        }
        if($etat){
            $query->where('etat_id', $etat);
        }
        if($local){
            $query->where('local_id', $local);
        }
        if($fonctionnaire){
            $query->whereHas('commandLine.command.fonctionaire', function($q) use ($fonctionnaire) {
                $q->where('nom', 'LIKE', "%{$fonctionnaire}%")
                  ->orWhere('prenom', 'LIKE', "%{$fonctionnaire}%")
                  ->orWhereRaw("CONCAT(prenom, ' ', nom) LIKE ?", ["%{$fonctionnaire}%"]);
            });
        }
        if($type_material){
            $query->whereHas('commandLine.material', function($q) use ($type_material) {
                $q->where('type_material_id', $type_material);
            });
        }

        $affectations = $query->latest()->paginate(10)->withQueryString();

        $etats = Etat::all();
        $locals = Local::all();
        $typeMaterials = TypeMaterial::all();

        return view('affectations.index', compact('affectations', 'etats', 'locals', 'typeMaterials'));
    }

    public function show(Affectation $affectation)
    {
        return view('affectations.show', compact('affectation'));
    }

    public function create()
    {
        $commandLine = request()->commandLine ?? null;
        $commandLine = CommandLine::findOrFail($commandLine);
        $etats = Etat::all();
        $locals = Local::all();
        $departements = Departement::all();
        return view('affectations.create', compact('commandLine', 'etats', 'locals', 'departements'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'numero_inventaire.*' => 'required|unique:affectations,numero_inventaire',
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
            'numero_inventaire' => 'required|unique:affectations,numero_inventaire,' . $affectation->id,
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

    public function reaffecter(Affectation $affectation)
    {
        $etats = Etat::all();
        $locals = Local::all();
        $departements = Departement::all();
        return view('affectations.reaffecter', compact('affectation','etats', 'locals', 'departements'));
    }

    public function reaffecterStore(Request $request)
    {
        $validated = $request->validate([
            'numero_inventaire' => 'required',
            'etat_id' => 'required|exists:etats,id',
            'local_id' => 'required|exists:locals,id',
            'command_line_id' => 'required|exists:command_lines,id',
        ]);

        Affectation::create([
            'numero_inventaire' => $request->numero_inventaire,
            'etat_id' => $request->etat_id,
            'local_id' => $request->local_id,
            'command_line_id' => $request->command_line_id,
        ]);

        return redirect()->route('affectations.index')
            ->with('success', 'Affectations créées avec succès.');

    }

    public function generatePDF(Affectation $affectation)
    {
        $pdf = PDF::loadView('affectations.pdf', compact('affectation'));
        return $pdf->download('affectation-' . $affectation->numero_inventaire . '.pdf');
    }

}
