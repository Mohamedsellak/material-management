<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reclamation extends Model
{
    protected $fillable = ["name", "description", "status", "commentaire", "local_id", "user_id", "command_id"];

    public function local()
    {
        return $this->belongsTo(Local::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function command()
    {
        return $this->belongsTo(Command::class);
    }
}
