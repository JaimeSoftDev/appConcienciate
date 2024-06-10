@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Panel de administración principal</h1>
@stop

@section('content')
<h4>
    @php
    echo 'Buenos días '. Auth::user()->nombre.' '.Auth::user()->apellido1.'. Bienvenido a la app de Conciénciate.';
    @endphp
</h4>
<p>@php
    echo 'Usted ha accedido con el rol de '. Auth::user()->roles()->first()->name.'.';
    @endphp</p>
@stop

@section('css')
{{-- Add here extra stylesheets --}}
{{--
<link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
<script>
    console.log("Bienvenido a ConcienciateApp"); 
</script>
@stop