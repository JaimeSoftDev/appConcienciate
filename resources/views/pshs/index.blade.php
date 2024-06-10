@extends('adminlte::page')

@section('title', 'PSH')

@section('content_header')
<h1>Listado de personas sin hogar</h1>
@stop
@section('content')
<a href="{{ route('pshs.create') }}" class="edit btn btn-primary btn-sm mb-2">Añadir PSH</a>
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{session('success')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
<div class="container">
    <table id="pshs-table" class="table table-bordered">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Sexo</th>
                <th>DNI</th>
                <th>Email</th>
                <th>Cama</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pshs as $psh)
            <tr>
                <td><a href="{{ route('pshs.show', $psh->id) }}" class="edit btn btn-primary btn-sm">{{ $psh->id
                        }}</a></td>
                <td>{{ $psh->nombre }}</td>
                <td>{{ $psh->apellido1 }}</td>
                <td>{{ $psh->sexo }}</td>
                <td>{{ $psh->dni }}</td>
                <td>
                    @if ($psh->email)
                    {{ $psh->email }}
                    @else
                    No hay email
                    @endif
                </td>
                <td>
                    @if ($psh->cama)
                    {{ $psh->cama->id }}
                    @else
                    No
                    @endif
                </td>
                <td class="align-middle">
                    <a href="{{ route('pshs.edit', $psh->id) }}"
                        class="edit btn btn-primary btn-sm btn-success">Editar</a>
                    <form action="{{ route('pshs.destroy', $psh->id) }}" id="delete_form" method="POST"
                        onsubmit="return confirm('¿Está seguro que desea eliminar el registro?')"
                        style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="submit" class="btn btn-sm btn-danger" value="Eliminar">
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.5/css/responsive.bootstrap4.min.css">
@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.5/js/responsive.bootstrap4.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
            $('#pshs-table').DataTable({
                responsive: true,
                paging: true,
                language: {
                "decimal": "",
                "emptyTable": "No hay información",
                "info": "Mostrando _END_ pshs de _TOTAL_",
                "infoEmpty": "Mostrando 0 a 0 de 0 Entradas",
                "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "No se encontraron resultados",
                "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
                },
                "aria": {
                "sortAscending": ": activar para ordenar la columna de manera ascendente",
                "sortDescending": ": activar para ordenar la columna de manera descendente"
                }}
            });
        });
</script>
@endsection