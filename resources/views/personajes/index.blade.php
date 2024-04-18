@extends('layouts.plantilla')

@section('title', 'RICK AND MORTY')

@section('subtitle', 'Selecciona que vista deseas visitar')

@section('content')
    <div class="container mt-3">
        <a href="{{url('personajes')}}" class="btn btn-primary">Personajes</a>
        <a href="{{url('personajes/guardados')}}" class="btn btn-warning">Personajes Guardados</a>
    </div>
@endSection