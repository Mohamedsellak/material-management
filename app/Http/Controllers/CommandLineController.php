<?php

namespace App\Http\Controllers;

use App\Models\CommandLine;
use Illuminate\Http\Request;
use App\Models\Material;
use App\Models\Command;
use App\Models\TypeMaterial;
use PDF;

class CommandLineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = CommandLine::query();

        // Filter by command ID (for redirects only)
        // if ($request->filled('command_id')) {
        //     $query->where('command_id', $request->command_id);
        // }

        // Filter by fonctionnaire name
        if ($request->filled('search')) {
            $search = strtolower($request->get('search'));
            $query->whereHas('command.fonctionaire', function($q) use ($search) {
                $q->whereRaw('LOWER(nom) LIKE ?', ["%{$search}%"])
                  ->orWhereRaw('LOWER(prenom) LIKE ?', ["%{$search}%"]);
            });
        }

        $commandLines = $query->with(['command.fonctionaire', 'material', 'affectations'])
                            ->latest()
                            ->paginate(8)
                            ->withQueryString();

        return view('command_lines.index', compact('commandLines'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

        $command = Command::find($request->command_id);

        if (!$command) {
            return redirect()->route('commands.index')->with('error', 'Commande non trouvée.');
        }

        $commandLines = CommandLine::where('command_id', $command->id)->get();
        $typeMaterials = TypeMaterial::latest()->get();
        $materials = Material::latest()->get();
        return view('command_lines.create', compact('command', 'materials', 'typeMaterials', 'commandLines'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'command_id' => 'required|exists:commands,id',
            'material_id' => 'required|exists:materials,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $material = Material::find($request->material_id);

        if ($material->quantity < $request->quantity) {
            return back()->with('error', 'La quantité de matériel est insuffisante.')
                ->withInput();
        }

        $material->decrement('quantity', $request->quantity);

        $commandLine = CommandLine::create($request->all());

        return redirect()->route('command_lines.create',["command_id"=>$request->command_id])
            ->with('success', 'Ligne de commande créée avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(CommandLine $commandLine)
    {
        //
        return view('command_lines.show', compact('commandLine'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CommandLine $commandLine)
    {
        $command = Command::find($commandLine->command_id);
        if (!$command) {
            return redirect()->route('commands.index')->with('error', 'Commande non trouvée.');
        }

        $materials = Material::all();
        return view('command_lines.edit', compact('commandLine', 'command', 'materials'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CommandLine $commandLine)
    {
        //
        $request->validate([
            'command_id' => 'required|exists:commands,id',
            'material_id' => 'required|exists:materials,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $material = Material::find($request->material_id);
        $oldQuantity = $commandLine->quantity;
        $newQuantity = $request->quantity;


        if ($material->quantity + $oldQuantity < $request->quantity) {
            return back()->with('error', 'La quantité de matériel est insuffisante.')
                ->withInput();
        }

        $commandLine->update($request->all());
        $material->increment('quantity', $oldQuantity);
        $material->decrement('quantity', $newQuantity);

        return redirect()->route('command_lines.index')
            ->with('success', 'Ligne de commande modifiée avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CommandLine $commandLine)
    {
        //
        $material = Material::find($commandLine->material_id);
        $material->increment('quantity', $commandLine->quantity);

        $commandLine->delete();

        if (request('redirect_to') === 'create') {
            return redirect()->route('command_lines.create', ['command_id' => request('command_id')])
                ->with('success', 'Ligne de commande supprimée avec succès.');
        }

        return redirect()->route('command_lines.index')
            ->with('success', 'Ligne de commande supprimée avec succès.');
    }

    public function generatePDF(CommandLine $commandLine)
    {
        $pdf = PDF::loadView('command_lines.pdf', compact('commandLine'));
        return $pdf->download('command_lines.pdf');
    }
}
