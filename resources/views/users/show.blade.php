@extends('adminlte::page')

@section('content')
<div class="container">
    <h1>Detalles del Usuario</h1>
    <div>
        <p><strong>ID:</strong> {{ $user->id }}</p>
        <p><strong>Nombre:</strong> {{ $user->nombre.' '.$user->apellido1.' '.$user->apellido2 }}</p>
        <p><strong>Email:</strong> {{ $user->email }}</p>
        <p><strong>DNI:</strong> {{ $user->dni }}</p>
    </div>
</div>
@endsection