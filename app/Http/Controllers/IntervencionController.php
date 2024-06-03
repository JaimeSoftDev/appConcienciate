<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateIntervencionRequest;
use App\Models\Intervencion;
use App\Models\Psh;
use Illuminate\Http\Request;

class IntervencionController extends Controller
{
    public function index()
    {
        $intervenciones = Intervencion::with('psh')->get();
        return view('intervenciones.index', compact('intervenciones'));
    }
    public function create()
    {
        return view('intervenciones.create');
    }
    public function store(CreateIntervencionRequest $request)
    {
        $validated = $request->validated();
        Intervencion::create($validated);
        return redirect()->route('intervenciones.index')->with('success', 'Intervención creada con éxito.');
    }
    public function show(Intervencion $intervencion)
    {
        $intervencion->load('psh');
        return view('intervenciones.show', compact('intervencion'));
    }
    public function edit(Intervencion $intervencion)
    {
        return view('intervenciones.edit', compact('intervencion'));
    }
    public function update(CreateIntervencionRequest $request, Intervencion $intervencion)
    {
        $validated = $request->validated();
        $intervencion->update($validated);
        return redirect()->route('intervenciones.index')->with('success', 'Intervención actualizada con éxito.');
    }
    public function destroy(Intervencion $intervencion)
    {
        $intervencion->delete();
        return redirect()->route('intervenciones.index')->with('success', 'Intervención eliminada con éxito.');
    }
}
