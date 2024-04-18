<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .fondo{
            background-color: rgb(97, 97, 97);
        }
        .carta{
            background-color: #f7f7f7
        }
        .contenedor {
          position: relative;
        }
        
        .img {
          display: block;
          width: 100%;
          height: auto;
        }
        
        .overlay {
          position: absolute;
          bottom: 100%;
          left: 0;
          right: 0;
          background-color: #ebe84e;
          overflow: hidden;
          width: 100%;
          height:0;
          transition: .5s ease;
        }
        
        .contenedor:hover .overlay {
          bottom: 0;
          height: 100%;
        }
        
        .texto {
          color: rgb(0, 0, 0);
          font-size: 20px;
          position: absolute;
          top: 50%;
          left: 50%;
          -webkit-transform: translate(-50%, -50%);
          -ms-transform: translate(-50%, -50%);
          transform: translate(-50%, -50%);
          text-align: center;
        }
    </style>
</head>
<body class="fondo" id="fondo">
    <div class="container mt-5">
        <div class="carta card text-center">
            <div class="card-header">
                <h1>@yield('title')</h1>
                <a href="{{url('/')}}" class="btn btn-danger">volver</a>
            </div>
            <div class="card-body">
                <h5 class="card-title">@yield('subtitle')</h5>
                @yield('content')
            </div>
            <div class="card-footer text-muted">
                Prueba Tecnica Basica para StoriTech
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalInfo" tabindex="-1" aria-labelledby="modalInfoLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="tituloModal">Informacion del personaje</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <h5 id="infoPersonaje"></h5>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
          </div>
        </div>
      </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
    @yield('scripts')
</body>
</html>