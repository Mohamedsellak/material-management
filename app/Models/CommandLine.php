<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model; 

class CommandLine extends Model
{
    protected $fillable = ['command_id', 'material_id', 'quantity'];

    public function command()
    {
        return $this->belongsTo(Command::class);
    }

    public function material()
    {
        return $this->belongsTo(Material::class);
    }
}
