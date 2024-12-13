<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fonctionaire extends Model
{
    protected $fillable = [
        'nom', 'prenom', 'email', 'telephone', 'departement_id'
    ];

    public function departement()
    {
        return $this->belongsTo(Departement::class);
    }
}
