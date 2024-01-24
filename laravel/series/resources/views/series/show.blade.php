<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ver serie</title>
</head>
<body>
    <p>Título: {{ $serie -> titulo }}</p>
    <p>Plataforma: {{ $serie -> plataforma }}</p>
    <p>Temporadas: {{ $serie -> numero_temporadas }}</p>

    <ul>
        @php
            $temporadas = $serie->temporadas;
        @endphp
        @foreach($temporadas as $temporada)
            <li>{{ $temporada->titulo_temporada }}</li>
        @endforeach
    </ul>
</body>
</html>