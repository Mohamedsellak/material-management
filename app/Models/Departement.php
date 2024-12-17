<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    //
    protected $fillable = ['name'];

    public function fonctionaires()
    {
        return $this->hasMany(Fonctionaire::class);
    }

    public function locals()
    {
        return $this->hasMany(Local::class);
    }
}
