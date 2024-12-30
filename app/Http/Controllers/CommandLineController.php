<?php

namespace App\Http\Controllers;

use App\Models\CommandLine;
use Illuminate\Http\Request;
use App\Models\Material;
use App\Models\Command;
use PDF;

class CommandLineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $commandLines = CommandLine::paginate(10);
        return view('command_lines.index', compact('commandLines'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $materials = Material::all();
        $commands = Command::all();
        return view('command_lines.create', compact('commands', 'materials'));
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

        return redirect()->route('command_lines.index')
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
        return view('command_lines.edit', [
            'commandLine' => $commandLine,
            'commands' => Command::all(),
            'materials' => Material::all()
        ]);
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
        return redirect()->route('command_lines.index')
            ->with('success', 'Ligne de commande supprimée avec succès.');
    }

    public function generatePDF(CommandLine $commandLine)
    {
        $pdf = PDF::loadView('command_lines.pdf', compact('commandLine'));
        return $pdf->download('command_lines.pdf');
    }
}
