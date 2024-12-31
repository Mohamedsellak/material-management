<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reclamation;
use App\Models\Local;


class FonctionnaireReclamationController extends Controller
{
    //
    public function index()
    {
        $reclamations = Reclamation::where('user_id', session('user')->id)->get();
        return view('fonctionnaire.reclamation.index', compact('reclamations'));
    }

    public function create()
    {
        return view('fonctionnaire.reclamation.create');
    }

    public function store(Request $request)
    {
        $reclamation = new Reclamation();
        $reclamation->save();
        return redirect()->route('fonctionnaire.reclamation.index');
    }

    public function show($id)
    {
        $reclamation = Reclamation::find($id);
        return view('fonctionnaire.reclamation.show', compact('reclamation'));
    }

    public function edit($id)
    {
        $reclamation = Reclamation::find($id);
        return view('fonctionnaire.reclamation.edit', compact('reclamation'));
    }

    public function update(Request $request, $id)
    {
        $reclamation = Reclamation::find($id);
        $reclamation->update($request->all());
        return redirect()->route('fonctionnaire.reclamation.index');
    }

    public function destroy($id)
    {
        $reclamation = Reclamation::find($id);
        $reclamation->delete();
        return redirect()->route('fonctionnaire.reclamation.index');
    }

}
