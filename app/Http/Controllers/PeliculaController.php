<?php

namespace App\Http\Controllers;

use App\Models\Pelicula;
use Illuminate\Http\Request;

class PeliculaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('peliculas.index', [
            'peliculas' => Pelicula::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('peliculas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'titulo' => 'required|max:255',
        ]);

        $Pelicula = new Pelicula();
        $Pelicula->titulo = $request->input('titulo');
        $Pelicula->save();
        session()->flash('success', 'La película se ha creado correctamente.');
        return redirect()->route('peliculas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pelicula $pelicula)
    {
        return view('peliculas.show', [
            'pelicula' => $pelicula,
            'total' => $pelicula->cantidadEntradas(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pelicula $pelicula)
    {
        if ($pelicula->cantidadEntradas() > 0) {
            session()->flash('error', 'No se puede cambiar la película porque tiene entradas.');
            return redirect()->route('peliculas.index');
        } else {
            return view('peliculas.edit', [
                'pelicula' => $pelicula,
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pelicula $pelicula)
    {
        if ($pelicula->cantidadEntradas() > 0) {
            session()->flash('error', 'No se puede cambiar la película porque tiene entradas.');
        } else {
            $validated = $request->validate([
                'titulo' => 'required|max:255',
            ]);

            $pelicula->titulo = $request->input('titulo');
            $pelicula->save();
        }
        return redirect()->route('peliculas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pelicula $pelicula)
    {
        if ($pelicula->cantidadEntradas() > 0) {
            session()->flash('error', 'No se puede eliminar la película porque tiene entradas.');
        } else {
            $pelicula->delete();
            session()->flash('success', 'La película se ha eliminado correctamente.');
        }
        return redirect()->route('peliculas.index');
    }
}
