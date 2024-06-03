<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSolicitudRequest;
use App\Models\Psh;
use App\Models\Solicitud;
use Illuminate\Http\Request;

class SolicitudController extends Controller
{
    /**
     * Muestra una lista de las solicitudes.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $solicitudes = Solicitud::with('psh')->get();
        return view('solicitudes.index', compact('solicitudes'));
    }
    public function create()
    {
        return view('solicitudes.create');
    }
    public function store(CreateSolicitudRequest $request)
    {
        $validated = $request->validated();
        Solicitud::create($validated);
        return redirect()->route('solicitudes.index')->with('success', 'Solicitud creada con éxito.');
    }
    public function show(Solicitud $solicitud)
    {
        $solicitud->load('psh');
        return view('solicitudes.show', compact('solicitud'));
    }
    public function edit(Solicitud $solicitud)
    {
        return view('solicitudes.edit', compact('solicitud'));
    }
    public function update(CreateSolicitudRequest $request, Solicitud $solicitud)
    {
        $validated = $request->validated();
        $solicitud->update($validated);
        return redirect()->route('solicitudes.index')->with('success', 'Solicitud actualizada con éxito.');
    }
    public function destroy(Solicitud $solicitud)
    {
        $solicitud->delete();
        return redirect()->route('solicitudes.index')->with('success', 'Solicitud eliminada con éxito.');
    }
}
