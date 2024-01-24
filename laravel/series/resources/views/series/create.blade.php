<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nueva serie</title>
</head>
<body>
    <form action="{{ route('series.store') }}" method="post">
        @csrf 
        <label>Título</label>
        <input type="text" name="titulo"><br><br>
        <label>Plataforma</label>
        <input type="text" name="plataforma"><br><br>
        <label>Temporadas</label>
        <input type="number" name="numero_temporadas"><br><br>
        <input type="submit" value="Crear">
    </form>
</body>
</html>