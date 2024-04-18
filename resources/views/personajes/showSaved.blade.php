@extends('layouts.plantilla')

@section('title', 'Personajes Guardados')

@section('subtitle', 'Personajes guardados en la base de datos')

@section('content')
    <div class="container">
        <div class="row">
            @foreach ($personajes as $personaje)
                <div class="col col-4 mt-2">
                    <div class="card" > 
                        <img class="card-img-top" src="{{$personaje['imagen']}}">
                        <div class="card-body">
                            <h5 class="card-title">Nombre: {{$personaje['nombre']}}</h5>
                            <h5 class="card-title">Estado: {{$personaje['estado']}}</h5>
                            <h5 class="card-title">Especie: {{$personaje['especie']}}</h5>
                            <form action="{{url('personajes/eliminar')}}" method="POST">
                                @csrf
                                <input type="hidden" id="idPersonaje" name="idPersonaje" value="{{$personaje['idPersonaje']}}">
                                <button class="btn btn-danger" type="submit">
                                    Eliminar personaje
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach              
        </div>
    </div>
@endSection