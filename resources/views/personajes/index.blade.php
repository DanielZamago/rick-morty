@extends('layouts.plantilla')

@section('title', 'RICK AND MORTY')

@section('subtitle', 'Selecciona que vista deseas visitar')

@section('content')
    <div class="container mt-3">
        @if(session('mensaje'))
            <div id="mensaje" class="alert alert-success">
                {{ session('mensaje') }}
            </div>
        @endif
        @if(session('error'))
            <div id="error" class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <a href="{{url('personajes')}}" class="btn btn-primary">Personajes</a>
        <a href="{{url('personajes/guardados')}}" class="btn btn-warning">Personajes Guardados</a>
    </div>
@endSection