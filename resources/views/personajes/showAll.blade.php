@extends('layouts.plantilla')

@section('title', 'Personajes')

@section('subtitle', 'Aqui se muestran todos los personajes')

@section('content')
    <div class="container">
        <div class="container col-3 mt-3">
            <form id="form">
                @csrf
                <div class="input-group mb-3">
                    <input type="number" class="form-control" name="idLocalizacion" placeholder="ID Localización">
                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Buscar</button>
                </div>
            </form>
        </div>
        <div class="row">

        </div>
    </div>
@endSection

@section('scripts')
    
    <script>
        $(document).ready(function(){
            $('#form').submit(function(e){
                e.preventDefault();
                $.ajax({
                    url: 'personajes/buscar',
                    type: 'POST',
                    data: {
                        _token: $('input[name="_token"]').val(),
                        idLocalizacion: $('input[name="idLocalizacion"]').val()
                    },
                }).done(function(data){
                    var personajes = JSON.parse(data);
                    console.log(personajes);
                    $('.row').empty();
                    if(personajes.length == undefined || personajes.length == 0){
                        $('.row').append(`
                            <div class="col col-12 mt-2">
                                <div class="alert alert-danger" role="alert">
                                    No se encontraron personajes
                                </div>
                            </div>
                        `);
                    }else{
                        personajes.forEach(personaje => {
                            $('.row').append(`
                                <div class="col col-4 mt-2">
                                    <div class="card" > 
                                        <div class="contenedor">
                                            <button class="btn" type="button" data-bs-toggle="modal" data-bs-target="#modalInfo" onclick="cambiarTextoModal(${personaje.id})">
                                                <img src="${personaje.image}" alt="Avatar" class="img">
                                                <div class="overlay" >
                                                    <div class="texto">${personaje.name}</div>
                                                </div>
                                            </button>
                                        </div>
                                        <div class="card-header">
                                            <form action="personajes/guardar" method="POST">
                                                @csrf
                                                <input type="hidden" id="idPersonaje" name="idPersonaje" value="${personaje.id}">
                                                <button class="btn btn-success" type="submit">
                                                    Guardar personaje
                                                </button>
                                            </form>
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title">Nombre: ${personaje.name}</h5>
                                            <h5 class="card-title
                                            ">Estado: ${personaje.status}</h5>
                                            <h5 class="card-title
                                            ">Especie: ${personaje.species}</h5>
                                            <h5 class="card-title
                                            ">Origen: ${personaje.origin.name}</h5>
                                            <h5 class="card-text">Episodios: </h5>
                                            <div class="card-text">
                                                ${personaje.episode.map((episodio, index) => {
                                                    if(index < 3){
                                                        return `<a href="${episodio}">${episodio}</a><br>`;
                                                    }
                                                }).join('')}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            `);
                        });
                    }
                });
            });
        });

        function cambiarTextoModal(id){
            $.ajax({
                url: 'https://rickandmortyapi.com/api/character/' + id,
                type: 'GET'
            }).done(function(personaje){
                $('#infoPersonaje').text(personaje.name + " -> " + personaje.status + ", " + personaje.species + ", " + personaje.origin.name);
            });
        }

    </script>
@endSection