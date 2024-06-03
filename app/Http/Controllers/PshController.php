<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePshRequest;
use App\Http\Requests\UpdatePshRequest;
use App\Models\Cama;
use App\Models\Intervencion;
use App\Models\Psh;
use App\Models\Solicitud;
use Illuminate\Http\Request;

class PshController extends Controller
{
    public function index()
    {
        $pshs = Psh::with(['cama', 'solicituds', 'intervencions'])->get();
        return view('pshs.index', compact('pshs'));
    }
    public function create()
    {
        return view('pshs.create');
    }
    public function store(CreatePshRequest $request)
    {
        $validated = $request->validated();
        $psh = Psh::create($validated);
        return redirect()->route('pshs.index')->with('success', 'PSH creado con éxito.');
    }
    public function show(Psh $psh)
    {
        $psh->load(['cama', 'solicituds', 'intervencions']);
        return view('pshs.show', compact('psh'));
    }
    public function edit(Psh $psh)
    {
        return view('pshs.edit', compact('psh'));
    }
    public function update(UpdatePshRequest $request, Psh $psh)
    {
        $validated = $request->validated();
        $psh->update($validated);
        return redirect()->route('pshs.index')->with('success', 'PSH actualizado con éxito.');
    }
    public function destroy(Psh $psh)
    {
        $psh->delete();
        return redirect()->route('pshs.index')->with('success', 'PSH eliminado con éxito.');
    }
}
