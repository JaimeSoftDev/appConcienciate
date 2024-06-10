@extends('adminlte::page')

@section('title', 'Intervenciones')

@section('content_header')
<h1>Listado de intervenciones</h1>
@stop
@section('content')
<a href="{{ route('intervencions.create') }}" class="edit btn btn-primary btn-sm mb-2">Añadir intervención</a>
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{session('success')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
<div class="container">
    <table id="intervencions-table" class="table table-bordered">
        <thead>
            <tr>
                <th>Id</th>
                <th>Intervenido</th>
                <th>Campo</th>
                <th>Area</th>
                @role('admin')
                <th>Acciones</th>
                @endrole
            </tr>
        </thead>
        <tbody>
            @foreach($intervencions as $intervencion)
            <tr>
                <td><a href="{{ route('intervencions.show', $intervencion->id) }}"
                        class="edit btn btn-primary btn-sm">{{
                        $intervencion->id
                        }}</a></td>
                <td>{{ $intervencion->psh->nombre . ' ' . $intervencion->psh->apellido1 . ' ' .
                    $intervencion->psh->apellido2
                    }}
                </td>
                <td>{{ $intervencion->campo }}</td>
                <td>{{ $intervencion->area }}</td>
                @role('admin')
                <td class="align-middle">
                    <form action="{{ route('intervencions.destroy', $intervencion->id) }}" id="delete_form"
                        method="POST" onsubmit="return confirm('¿Está seguro que desea eliminar el registro?')"
                        style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="submit" class="btn btn-sm btn-danger" value="Eliminar">
                    </form>
                </td>
                @endrole
            </tr>@endforeach
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
            $('#intervencions-table').DataTable({
                responsive: true,
                paging: true,
                language: {
                "decimal": "",
                "emptyTable": "No hay información",
                "info": "Mostrando _END_ de _TOTAL_",
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