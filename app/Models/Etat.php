<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Etat extends Model
{
    //
    protected $fillable = ['name'];

    public function affectations()
    {
        return $this->hasMany(Affectation::class);
    }
}
