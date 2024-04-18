<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
</head>
<body class="fondo">
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
    @yield('scripts')
</body>
</html>