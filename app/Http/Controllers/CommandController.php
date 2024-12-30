<?php

namespace App\Http\Controllers;

use App\Models\Command;
use Illuminate\Http\Request;
use App\Models\Fonctionaire;
class CommandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $commands = Command::paginate(10);
        return view('commands.index', compact('commands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $fonctionaires = Fonctionaire::all();
        return view('commands.create', compact('fonctionaires'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'fonctionaire_id' => 'required|exists:fonctionaires,id',
            'date_commande' => 'required|date',
        ]);
        Command::create($request->all());
        return redirect()->route('commands.index')->with('success', 'Commande créée avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(Command $command)
    {
        //
        return view('commands.show', compact('command'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Command $command)
    {
        //
        $fonctionaires = Fonctionaire::all();
        return view('commands.edit', compact('command', 'fonctionaires'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Command $command)
    {
        //
        $request->validate([
            'fonctionaire_id' => 'required|exists:fonctionaires,id',
            'date_commande' => 'required|date',
        ]);
        $command->update($request->all());
        return redirect()->route('commands.index')->with('success', 'Commande modifiée avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Command $command)
    {
        //
        $command->delete();
        return redirect()->route('commands.index')->with('success', 'Commande supprimée avec succès');
    }
}
