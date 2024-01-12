<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Página principal de las series</h1>
    <p>{{ $mensaje }}</p>
    
    <table>
        <thead>
            <tr>
                <th>Título</th>
                <th>Plataforma</th>
                <th>Temporadas</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($series as $serie)
                <tr>
                    <td>{{ $serie->titulo }}</td>
                    <td>{{ $serie->plataforma }}</td>
                    <td>{{ $serie->temporadas }}</td>
                    <td>
                        <form action="{{ route('series.show', ['series' => $serie->id]) }}" method="get">
                            <input type="submit" value="Ver">
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('series.edit', ['series' => $serie->id]) }}" method="get">
                            <input type="submit" value="Editar">
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('series.destroy', ['series' => $serie->id]) }}" method="post">
                            @csrf
                            {{ method_field('DELETE') }}
                            <input type="submit" value="Borrar">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>