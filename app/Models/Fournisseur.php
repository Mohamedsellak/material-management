<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fournisseur extends Model
{
    //
    protected $fillable = ['name', 'adresse', 'telephone', 'email'];

    public function entrees()
    {
        return $this->hasMany(Entree::class);
    }
}
