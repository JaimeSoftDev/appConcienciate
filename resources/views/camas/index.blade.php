@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Listado de camas</h1>
@stop

@section('content')
<div class="container-fluid">
    <!-- Your grid and cards will go here -->
    <div class="row">
        @foreach ($camas as $cama)
        <div class="col-md-4">
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title mb-2"><strong>{{ 'Cama ' . $cama->id }}</strong></h5>
                    <p class="card-text">{{ 'Módulo: ' . $cama->modulo }}<strong>{{ $cama->emergencia? ' Emergencia' :
                            ''
                            }}</strong></p>
                    @if ($cama->psh)
                    <p class="card-text mb-4">{{$cama->psh->id . ' - ' . $cama->psh->nombre . ' ' .
                        $cama->psh->apellido1}}
                    </p>
                    <form action="{{ route('camas.update', $cama->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="psh_id" id="psh_id" value="">
                        <input type="hidden" name="asignada" id="asignada" value="0">
                        <input type="hidden" name="emergencia" id="emergencia" value="{{ $cama->emergencia }}">
                        <input type="hidden" name="modulo" id="modulo" value="{{ $cama->modulo }}">
                        <button type="submit" class="btn btn-primary btn-danger mb-1">Desasignar</button>
                    </form>
                    @else
                    <form action="{{ route('camas.update', $cama->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <select class="form-control" id="psh_id" name="psh_id">
                                @foreach ($pshs as $psh)
                                @if ($cama->modulo=='masculino' && $psh->sexo=='hombre' || $cama->modulo=='femenino' &&
                                $psh->sexo=='mujer')
                                <option value="{{ $psh->id }}">{{ $psh->id . ' - ' . $psh->nombre . ' ' .
                                    $psh->apellido1}}
                                </option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        <input type="hidden" name="asignada" id="asignada" value="1">
                        <input type="hidden" name="emergencia" id="emergencia" value="{{ $cama->emergencia }}">
                        <input type="hidden" name="modulo" id="modulo" value="{{ $cama->modulo }}">
                        <button type="submit" class="btn btn-primary">Asignar</button>
                    </form>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@stop

@section('css')
{{-- Add here extra stylesheets --}}
{{--
<link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
<script>
    console.log("Hi, I'm using the Laravel-AdminLTE package!"); 
</script>
@stop