<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Temporadas</title>
</head>
<body>
    <h1>Temporadas</h1>

    <table>
        <thead>
            <tr>
                <th>Serie</th>
                <th>Número temporada</th>
                <th>Título temporada</th>
                <th>Capítulos</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($temporadas as $temporada)
                <tr>
                    <td>{{ $temporada->serie->titulo }}</td>
                    <td>{{ $temporada->numero_temporada }}</td>
                    <td>{{ $temporada->titulo_temporada }}</td>
                    <td>{{ $temporada->numero_capitulos }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>