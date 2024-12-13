<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entree extends Model
{
    //
    protected $table = 'entrees';
    protected $fillable = ['date','quantity', 'unit_price', 'material_id','fournisseur_id'];

    public function material()
    {
        return $this->belongsTo(Material::class);
    }

    public function fournisseur()
    {
        return $this->belongsTo(Fournisseur::class);
    }
}
