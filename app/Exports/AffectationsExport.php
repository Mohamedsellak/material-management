<?php

namespace App\Exports;

use App\Models\Affectation;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AffectationsExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Affectation::with(['etat', 'local', 'commandLine'])->get()->map(function ($affectation) {
            return [
                'numero_inventaire' => $affectation->numero_inventaire,
                'etat' => $affectation->etat->name,
                'local' => $affectation->local->name,
                'ligne_commande' => $affectation->commandLine->id,
            ];
        });
    }

    public function headings(): array
    {
        return [
            'N° Inventaire',
            'État',
            'Local',
            'Ligne de Commande',
        ];
    }
} 