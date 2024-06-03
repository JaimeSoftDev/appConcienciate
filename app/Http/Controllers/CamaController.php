<?php

namespace App\Http\Controllers;

use App\Models\Cama;
use App\Models\Psh;
use Illuminate\Http\Request;

class CamaController extends Controller
{
    /**
     * Muestra una lista de las camas.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $camas = Cama::with('psh')->get();
        return view('camas.index', compact('camas'));
    }
    public function show(Cama $cama)
    {
        $cama->load('psh');
        return view('camas.show', compact('cama'));
    }
    public function edit(Cama $cama)
    {
        $pshs = Psh::all();
        $cama->load('psh');
        return view('camas.edit', compact('cama', 'pshs'));
    }
    public function update(Request $request, Cama $cama)
    {
        $validated = $request->validate([
            'nombre' => 'sometimes|required|string|max:255',
            'descripcion' => 'sometimes|required|string|max:255',
            'psh_id' => 'sometimes|required|exists:pshs,id',
            // Agrega aquí más reglas de validación según sea necesario
        ]);

        $cama->update($validated);

        return redirect()->route('camas.index')->with('success', 'Cama actualizada con éxito.');
    }
}
