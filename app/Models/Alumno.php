<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;

    public function notas()
    {
        return $this->hasMany(Nota::class);
    }



    public function ce()
    {
        // return $this->hasManyThrough(Entrada::class, Proyeccion::class);
        return $this->through('notas')->has('ccees');
    }

    public function cantidadNotas()
    {
        $total = 0;

        foreach ($this->notas as $nota) {
            $total += $nota->ce->count();
        }

        return $total;
    }
}
