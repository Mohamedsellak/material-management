<?php

namespace App\Http\Controllers;

use App\Models\CommandLine;
use Illuminate\Http\Request;
use App\Models\Material;
use App\Models\Command;

class CommandLineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $commandLines = CommandLine::all();
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
        // dd($request->all());
        $commandLine = CommandLine::create($request->all());
        // dd($commandLine->command_id);
        return redirect()->route('commands.show', $commandLine->command)
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
        $commandLine->update($request->all());
        return redirect()->route('commands.show', $commandLine->command_id)
            ->with('success', 'Ligne de commande modifiée avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CommandLine $commandLine)
    {
        //
        $commandLine->delete();
        return redirect()->route('commands.show', $commandLine->command_id)
            ->with('success', 'Ligne de commande supprimée avec succès.');
    }
}
