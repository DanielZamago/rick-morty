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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
                    $('.row').empty();
                    personajes.forEach(personaje => {
                        $('.row').append(`
                            <div class="col col-4 mt-2">
                                <div class="card" > 
                                    <img class="card-img-top" src="${personaje.image}">
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
                        
                });
            });
        });
    </script>
@endSection