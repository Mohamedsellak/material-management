<?php

namespace App\Http\Controllers;

use App\Models\Affectation;
use App\Models\Etat;
use PDF;

class CasseController extends Controller
{
    //
    public function index()
    {
        // dd('ok');
        $etat = Etat::where('name', 'casse')->first();
        if($etat){
            $affectations = Affectation::where('etat_id', $etat->id)->get();
        }else{
            $affectations = [];
        }

        return view('casse.index', compact('affectations'));
    }

    public function cassePdf(Affectation $affectation)
    {
        $pdf = PDF::loadView('casse.pdf', compact('affectation'));
        return $pdf->download('casse-' . $affectation->numero_inventaire . '.pdf');
    }
}
