@extends('layouts.plantilla')

@section('title', 'Personajes')

@section('subtitle', 'Aqui se muestran todos los personajes')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col col-4 mt-2">
                <div class="card" >
                    <img class="card-img-top" src="https://rickandmortyapi.com/api/character/avatar/87.jpeg">
                    <div class="card-body">
                        <h5 class="card-title">Nombre</h5>
                        <h5 class="card-title">Estado</h5>
                        <h5 class="card-title">Especie</h5>
                        <p class="card-text">Episodios:</p>
                        <p></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endSection