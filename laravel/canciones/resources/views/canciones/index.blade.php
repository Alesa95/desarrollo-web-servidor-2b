<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Canciones</title>
    {{ HTML::style('css/app.css') }}
</head>
<body>
    <ul>
        @foreach ($canciones as $cancion)
            <li>{{ $cancion -> titulo_cancion }} : {{ $cancion -> artista -> nombre_artista }}</li>
        @endforeach
    </ul>
</body>
</html>