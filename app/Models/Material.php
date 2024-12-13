<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    //
    protected $table = 'materials';
    protected $fillable = ['name', 'description', 'quantity', 'type_material_id'];

    public function typeMaterial()
    {
        return $this->belongsTo(TypeMaterial::class);
    }

    public function entrees()
    {
        return $this->hasMany(Entree::class);
    }
}