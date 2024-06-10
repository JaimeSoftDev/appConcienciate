@extends('adminlte::page')

@section('content')
<div class="container">
    <h1>Detalles de la intervención</h1>
    <div>
        <p><strong>ID:</strong> {{ $intervencion->id }}</p>
        <p><strong>Solicitante:</strong> {{ $intervencion->psh->nombre.' '.$intervencion->psh->apellido1.'
            '.$intervencion->psh->apellido2 }}</p>
        <p><strong>Campo:</strong> {{$intervencion->campo}}</p>
        <p><strong>Area:</strong> {{ $intervencion->area }}</p>
        <p><strong>Descripción:</strong> {{ $intervencion->descripcion }}</p>
        <p><strong>Última actualización:</strong> {{ $intervencion->updated_at }}</p>
    </div>
</div>

@endsection