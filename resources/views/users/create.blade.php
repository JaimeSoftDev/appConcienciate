@extends('adminlte::page')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Nuevo empleado</h1>
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

                        <form method="POST" action="{{route('users.store')}}">
                            @csrf
                            @method('POST')
                            <div class="form-group">
                                <label for="nombre" class="required">Nombre</label>
                                <input type="text" name="nombre" id="nombre"
                                    class="form-control {{$errors->has('nombre') ? 'is-invalid' : ''}}"
                                    value="{{old('nombre', '')}}">
                                @if ($errors->has('nombre'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('nombre') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="apellido1" class="required">Primer apellido</label>
                                <input type="text" name="apellido1" id="apellido1"
                                    class="form-control {{$errors->has('apellido1') ? 'is-invalid' : ''}}"
                                    value="{{old('apellido1', '')}}">
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
                                    value="{{old('apellido2', '')}}">
                                @if ($errors->has('apellido2'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('apellido2') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="email" class="required">Correo electrónico </label>
                                <input type="email" name="email" id="email"
                                    class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}"
                                    value="{{old('email', '')}}">
                                @if ($errors->has('email'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="dni" class="required">DNI </label>
                                <input type="text" name="dni" id="dni"
                                    class="form-control {{$errors->has('dni') ? 'is-invalid' : ''}}"
                                    value="{{old('dni', '')}}">
                                @if ($errors->has('dni'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('dni') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="password" class="required">Contraseña inicial </label>
                                <input type="text" name="password" id="password"
                                    class="form-control {{$errors->has('password') ? 'is-invalid' : ''}}"
                                    value="{{old('password', '')}}">
                                @if ($errors->has('password'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="row d-print-none mt-2">
                                <div class="col-12 text-right">
                                    <a class="btn btn-danger" href="{{route('users.index')}}">
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