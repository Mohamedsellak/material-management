<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Local extends Model
{
    protected $fillable = ['name', 'type_local_id', 'departement_id'];

    public function typeLocal()
    {
        return $this->belongsTo(TypeLocal::class);
    }

    public function departement()
    {
        return $this->belongsTo(Departement::class);
    } 
}