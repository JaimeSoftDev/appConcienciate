@extends('adminlte::page')

@section('content')
<div class="container">
    <h1>Detalles de la persona</h1>
    <div>
        <p><strong>ID:</strong> {{ $psh->id }}</p>
        <p><strong>Nombre:</strong> {{ $psh->nombre.' '.$psh->apellido1.' '.$psh->apellido2 }}</p>
        <p><strong>Email:</strong> {{$psh->email ?? 'No tiene email registrado'}}</p>
        <p><strong>DNI:</strong> {{ $psh->dni }}</p>
        <p><strong>Cama Asignada:</strong> {{$psh->cama->id ?? 'No tiene cama asignada'}}</p>
    </div>
</div>
<div class="container">
    @if (count($psh->solicituds) < 1) <p>{{ 'Esta persona no tiene solicitudes registradas' }}</p>
        @else <table id="solicituds-table" class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Articulo</th>
                    <th>Estado</th>
                    <th>Última actualización</th>
                </tr>
            </thead>
            <tbody>
                @foreach($psh->solicituds as $solicitud)
                <tr>
                    <td><a href="{{ route('solicituds.show', $solicitud->id) }}" class="edit btn btn-primary btn-sm">{{
                            $solicitud->id
                            }}</a></td>
                    <td>{{ $solicitud->articulo_solicitado }}</td>
                    <td>
                        {{ $solicitud->estado }}
                    </td>
                    <td>{{ $solicitud->updated_at }}</td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
        @if (count($psh->intervencions) < 1)<p>
            {{ 'Esta persona no tiene intervenciones registradas' }}</p> @else <table id="pshs-table"
                class="table table-bordered">
                <thead>
                    <tr>
                        <th>Campo</th>
                        <th>Area</th>
                        <th>Última actualización</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($psh->intervencions as $intervencion)
                    <tr>
                        <td><a href="{{ route('intervencions.show', $intervencion->id) }}">{{ $intervencion->campo
                                }}</a>
                        </td>
                        <td>{{ $intervencion->area }}</td>
                        <td>{{ $intervencion->updated_at }}</td>
                    </tr>
                    @endforeach
                    @endif
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
            $('#solicituds-table').DataTable({
                responsive: true,
                paging: true,
                language: {
                "decimal": "",
                "emptyTable": "No hay información",
                "info": "_END_ de _TOTAL_",
                "infoEmpty": "",
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
            $('#intervencions-table').DataTable({
                responsive: true,
                paging: true,
                language: {
                "decimal": "",
                "emptyTable": "No hay información",
                "info": " _END_ de _TOTAL_",
                "infoEmpty": "",
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