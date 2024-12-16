<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Command extends Model
{
    //
    protected $fillable = ['fonctionaire_id', 'date_commande'];

    public function fonctionaire()
    {
        return $this->belongsTo(Fonctionaire::class);
    }

    public function commandLines()
    {
        return $this->hasMany(CommandLine::class);
    }
}
