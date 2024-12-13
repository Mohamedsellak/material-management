<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    //
    protected $fillable = ['name'];

    public function fonctionnaires()
    {
        return $this->hasMany(Fonctionnaire::class);
    }
}
