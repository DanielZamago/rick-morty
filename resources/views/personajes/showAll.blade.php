@extends('layouts.plantilla')

@section('title', 'Personajes')

@section('subtitle', 'Aqui se muestran todos los personajes')

@section('content')
    <div class="container">
        <div class="container col-3 mt-3">
            <form action="{{url('personajes/buscar')}}" method="POST">
                @csrf
                <div class="input-group mb-3">
                    <input type="number" class="form-control" name="idLocalizacion" placeholder="ID Localización">
                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Buscar</button>
                </div>
            </form>
        </div>
        <div class="row">
            {{-- TODO Trabajar con vue los personajes --}}
            @foreach ($personajes as $personaje)
                <div class="col col-4 mt-2">
                    <div class="card" > 
                        <img class="card-img-top" src="{{$personaje['image']}}">
                        <div class="card-body">
                            <h5 class="card-title">Nombre: {{$personaje['name']}}</h5>
                            <h5 class="card-title">Estado: {{$personaje['status']}}</h5>
                            <h5 class="card-title">Especie: {{$personaje['species']}}</h5>
                            <h5 class="card-text">Episodios: </h5>
                            @for ($i = 0; $i < 3; $i++)
                                @if(isset($personaje['episode'][$i]))
                                    <a href="{{$personaje['episode'][$i]}}">{{$personaje['episode'][$i]}}</a>
                                @endif
                            @endfor
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endSection