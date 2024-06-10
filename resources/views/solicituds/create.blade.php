@extends('adminlte::page')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Nueva Solicitud</h1>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <form method="POST" action="{{route('solicituds.store')}}">
                            @csrf
                            @method('POST')

                            <div class="form-group">
                                <label for="psh_id" class="required">Persona solicitante</label>
                                <select class="form-control" name="psh_id" style="width: 100%;">
                                    @foreach ($pshs as $psh)
                                    <option value="{{ $psh->id }}" {{old('psh_id')==$psh->id ? 'selected' :''}}>
                                        {{ $psh->id.' - '.$psh->nombre.' '.$psh->apellido1 }}
                                    </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('psh_id'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('psh_id') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="articulo_solicitado" class="required">Artículo solicitado </label>
                                <input type="text" name="articulo_solicitado" id="articulo_solicitado"
                                    class="form-control {{$errors->has('articulo_solicitado') ? 'is-invalid' : ''}}"
                                    value="{{old('articulo_solicitado', '')}}">
                                @if ($errors->has('articulo_solicitado'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('articulo_solicitado') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="estado" class="required">Estado de la solicitud</label>
                                <select class="form-control" name="estado" style="width: 100%;">
                                    @foreach ($estados as $key => $value)
                                    <option value="{{ $key }}" {{old('estado')==$key ? 'selected' :''}}>
                                        {{ $value }}
                                    </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('estado'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('estado') }}</strong>
                                </span>
                                @endif
                            </div>
                            <input type="hidden" name="fecha" id="fecha" value="{{ now() }}">
                            <div class="row d-print-none mt-2">
                                <div class="col-12 text-right">
                                    <a class="btn btn-danger" href="{{url()->previous()}}">
                                        <i class="fa fa-fw fa-lg fa-arrow-left"></i>
                                        Regresar
                                    </a>
                                    <button class="btn btn-success" type="submit">
                                        <i class="fa fa-fw fa-lg fa-check-circle"></i>Guardar
                                    </button>
                                </div>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection