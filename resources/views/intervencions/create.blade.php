@extends('adminlte::page')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Nueva intervención</h1>
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

                        <form method="POST" action="{{route('intervencions.store')}}">
                            @csrf
                            @method('POST')

                            <div class="form-group">
                                <label for="psh_id" class="required">Persona intervenida</label>
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
                                <label for="campo" class="required">Campo de la intervención</label>
                                <select class="form-control" name="campo" style="width: 100%;">
                                    @foreach ($campos as $key => $value)
                                    <option value="{{ $key }}" {{old('campo')==$key ? 'selected' :''}}>
                                        {{ $value }}
                                    </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('campo'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('campo') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="area" class="required">Area de la intervención</label>
                                <select class="form-control" name="area" style="width: 100%;">
                                    @foreach ($areas as $key => $value)
                                    <option value="{{ $key }}" {{old('area')==$key ? 'selected' :''}}>
                                        {{ $value }}
                                    </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('area'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('area') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="descripcion" class="required">Descripción </label>
                                <input type="text" name="descripcion" id="descripcion"
                                    class="form-control {{$errors->has('descripcion') ? 'is-invalid' : ''}}"
                                    value="{{old('descripcion', '')}}">
                                @if ($errors->has('descripcion'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('descripcion') }}</strong>
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