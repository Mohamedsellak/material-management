<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeLocal extends Model
{
    //
    protected $fillable = ['name'];

    public function locals()
    {
        return $this->hasMany(Local::class);
    }
}
