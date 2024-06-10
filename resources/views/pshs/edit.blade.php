@extends('adminlte::page')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Editar información de la PSH</h1>
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
                        <form method="POST" action="{{route('pshs.update', $psh->id)}}">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="nombre" class="required">Nombre </label>
                                <input type="text" name="nombre" id="nombre"
                                    class="form-control {{$errors->has('nombre') ? 'is-invalid' : ''}}"
                                    value="{{old('nombre', $psh->nombre)}}">
                                @if ($errors->has('nombre'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('nombre') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="apellido1" class="required">Primer apellido </label>
                                <input type="text" name="apellido1" id="apellido1"
                                    class="form-control {{$errors->has('apellido1') ? 'is-invalid' : ''}}"
                                    value="{{old('apellido1', $psh->apellido1)}}">
                                @if ($errors->has('apellido1'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('apellido1') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="apellido2" class="required">Segundo apellido </label>
                                <input type="text" name="apellido2" id="apellido2"
                                    class="form-control {{$errors->has('apellido2') ? 'is-invalid' : ''}}"
                                    value="{{old('apellido2', $psh->apellido2)}}">
                                @if ($errors->has('apellido2'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('apellido2') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="email" class="required">Correo electrónico</label>
                                <input type="email" name="email" id="email"
                                    class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}"
                                    value="{{old('email', $psh->email)}}">
                                @if ($errors->has('email'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>


                            <div class="form-group">
                                <label for="dni" class="required">DNI</label>
                                <input type="text" name="dni" id="dni"
                                    class="form-control {{$errors->has('dni') ? 'is-invalid' : ''}}"
                                    value="{{old('dni', $psh->dni)}}">
                                @if ($errors->has('dni'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('dni') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="sexo" class="required">Sexo</label>
                                <select class="form-control" name="sexo" style="width: 100%;">
                                    @foreach ($sexos as $key => $value)
                                    <option value="{{ $key }}" {{old('sexo')==$key ? 'selected' :''}}>
                                        {{ $value }}
                                    </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('sexo'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('sexo') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="estado_civil" class="required">Estado civil</label>
                                <select class="form-control" name="estado_civil" style="width: 100%;">
                                    @foreach ($estados_civiles as $key => $value)
                                    <option value="{{ $key }}" {{old('estado_civil')==$key ? 'selected' :''}}>
                                        {{ $value }}
                                    </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('estado_civil'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('estado_civil') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="row d-print-none mt-2">
                                <div class="col-12 text-right">
                                    <a class="btn btn-danger" href="{{route('pshs.index')}}">
                                        <i class="fa fa-fw fa-lg fa-arrow-left"></i>
                                        Regresar
                                    </a>
                                    <button class="btn btn-success" type="submit">
                                        <i class="fa fa-fw fa-lg fa-check-circle"></i>Editar
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