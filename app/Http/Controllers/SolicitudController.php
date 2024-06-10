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
        $solicituds = Solicitud::with('psh')->get();
        return view('solicituds.index', compact('solicituds'));
    }
    public function getIniciadas()
    {
        $solicituds = Solicitud::with('psh')->where('estado', 'solicitado')->get();
        return view('solicituds.iniciadas', compact('solicituds'));
    }
    public function getEnProceso()
    {
        $solicituds = Solicitud::with('psh')->where('estado', 'proceso')->get();
        return view('solicituds.proceso', compact('solicituds'));
    }
    public function getFinalizadas()
    {
        $solicituds = Solicitud::with('psh')->where('estado', 'realizado')->get();
        return view('solicituds.finalizadas', compact('solicituds'));
    }
    public function create()
    {
        $pshs = Psh::all();
        $estados = Solicitud::ESTADOS;
        return view('solicituds.create', compact('pshs', 'estados'));
    }
    public function store(CreateSolicitudRequest $request)
    {
        $validated = $request->validated();
        Solicitud::create($validated);
        return redirect()->route('solicituds.index')->with('success', 'Solicitud creada con éxito.');
    }
    public function show(Solicitud $solicitud)
    {
        $solicitud->load('psh');
        return view('solicituds.show', compact('solicitud'));
    }
    public function edit(Solicitud $solicitud)
    {
        $pshs = Psh::all();
        $estados = Solicitud::ESTADOS;
        return view('solicituds.edit', compact('pshs', 'estados', 'solicitud'));
    }
    public function update(CreateSolicitudRequest $request, Solicitud $solicitud)
    {
        $validated = $request->validated();
        $solicitud->update($validated);
        return redirect()->route('solicituds.index')->with('success', 'Solicitud actualizada con éxito.');
    }
    public function destroy(Solicitud $solicitud)
    {
        $solicitud->delete();
        return redirect()->route('solicituds.index')->with('success', 'Solicitud eliminada con éxito.');
    }
}
