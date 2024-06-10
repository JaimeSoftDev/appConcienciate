@extends('adminlte::page')

@section('content')
<div class="container">
    <h1>Detalles de la solicitud</h1>
    <div>
        <p><strong>ID:</strong> {{ $solicitud->id }}</p>
        <p><strong>Solicitante:</strong> {{ $solicitud->psh->nombre.' '.$solicitud->psh->apellido1.'
            '.$solicitud->psh->apellido2 }}</p>
        <p><strong>Artículo solicitado:</strong> {{$solicitud->articulo_solicitado}}</p>
        <p><strong>Estado:</strong> {{ $solicitud->estado }}</p>
        <p><strong>Última actualización:</strong> {{ $solicitud->updated_at }}</p>
    </div>
</div>

@endsection