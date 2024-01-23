<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('alumnos.index', [
            'alumnos' => Alumno::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('alumnos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|max:255',
        ]);

        $Alumno = new Alumno();
        $Alumno->nombre = $request->input('nombre');
        $Alumno->save();
        session()->flash('success', 'El alumno se ha creado correctamente.');
        return redirect()->route('alumnos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Alumno $alumno)
    {
        return view('alumnos.show', [
            'alumno' => $alumno,
            'total' => $alumno->cantidadNotas(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alumno $alumno)
    {
        if ($alumno->cantidadNotas() > 0) {
            session()->flash('error', 'No se puede cambiar la alumnos porque tiene notas.');
            return redirect()->route('alumnos.index');
        } else {
            return view('alumnos.edit', [
                'alumno' => $alumno,
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Alumno $alumno)
    {
        if ($alumno->cantidadNotas() > 0) {
            session()->flash('error', 'No se puede cambiar el alumno porque tiene notas.');
        } else {
            $validated = $request->validate([
                'nombre' => 'required|max:255',
            ]);

            $alumno->nombre = $request->input('nombre');
            $alumno->save();
        }
        return redirect()->route('alumnos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alumno $alumno)
    {
        if ($alumno->cantidadNotas() > 0) {
            session()->flash('error', 'No se puede eliminar Alumno porque tiene notas.');
        } else {
            $alumno->delete();
            session()->flash('success', 'La película se ha eliminado correctamente.');
        }
        return redirect()->route('alumnos.index');
    }
}
