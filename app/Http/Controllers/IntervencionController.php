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
        $intervencions = Intervencion::with('psh')->get();
        return view('intervencions.psicologia', compact('intervencions'));
    }
    public function getPsicologia()
    {
        $intervencions = Intervencion::with('psh')->where('campo', 'psicologia')->get();
        return view('intervencions.psicologia', compact('intervencions'));
    }
    public function getTrabajoSocial()
    {
        $intervencions = Intervencion::with('psh')->where('campo', 'trabajo_social')->get();
        return view('intervencions.social', compact('intervencions'));
    }
    public function getAcogida()
    {
        $intervencions = Intervencion::with('psh')->where('campo', 'dispositivo_acogida')->get();
        return view('intervencions.acogida', compact('intervencions'));
    }
    public function create()
    {
        $pshs = Psh::all();
        $campos = Intervencion::CAMPOS;
        $areas = Intervencion::AREAS;
        return view('intervencions.create', compact('pshs', 'campos', 'areas'));
    }
    public function store(CreateIntervencionRequest $request)
    {
        $validated = $request->validated();
        Intervencion::create($validated);
        return redirect()->route('intervencions.index')->with('success', 'Intervención creada con éxito.');
    }
    public function show(Intervencion $intervencion)
    {
        $intervencion->load('psh');
        return view('intervencions.show', compact('intervencion'));
    }
    public function edit(Intervencion $intervencion)
    {
        return view('intervencions.edit', compact('intervencion'));
    }
    public function update(CreateIntervencionRequest $request, Intervencion $intervencion)
    {
        $validated = $request->validated();
        $intervencion->update($validated);
        return redirect()->route('intervencions.index')->with('success', 'Intervención actualizada con éxito.');
    }
    public function destroy(Intervencion $intervencion)
    {
        $intervencion->delete();
        return redirect()->route('intervencions.index')->with('success', 'Intervención eliminada con éxito.');
    }
}
