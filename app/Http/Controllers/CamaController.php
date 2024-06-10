<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateCamaRequest;
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
        $pshs = Psh::doesntHave('cama')->get();
        $camas = Cama::with('psh')->get();
        return view('camas.index', compact('camas', 'pshs'));
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
    public function update(UpdateCamaRequest $request, Cama $cama)
    {
        $cama->update($request->validated());

        return redirect()->route('camas.index')->with('success', 'Cama actualizada con éxito.');
    }
}
