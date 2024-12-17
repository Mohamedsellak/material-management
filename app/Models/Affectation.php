<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Affectation extends Model
{
    //
    protected $fillable = ['numero_inventaire', 'etat_id', 'local_id', 'command_line_id'];

    public function etat()
    {
        return $this->belongsTo(Etat::class);
    }

    public function local()
    {
        return $this->belongsTo(Local::class);
    }

    public function commandLine()
    {
        return $this->belongsTo(CommandLine::class);
    }

}
