<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ccee extends Model
{

    public function notas()
    {
        return $this->hasMany(Nota::class);


    }
    use HasFactory;
}
