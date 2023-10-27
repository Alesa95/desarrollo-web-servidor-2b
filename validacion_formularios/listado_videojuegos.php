<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de videojuegos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="estilo.css">
    <?php require '../funciones/conexion_videojuegos.php' ?>
</head>
<body> <!-- COLOR GAME #A70084 -->
    <div class="container">
        <h1>Listado de videojuegos</h1>

        <table class="table table-striped table-hover">
            <caption>Lista de videojuegos</caption>
            <thead class="table table-primary">
                <tr>
                    <th>ID Videojuego</th>
                    <th>Título</th>
                    <th>PEGI</th>
                    <th>Compañía</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $sql = "SELECT * FROM videojuegos";
                $resultado = $conexion -> query($sql);

                while($fila = $resultado -> fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $fila["id_videojuego"] . "</td>";
                    echo "<td>" . $fila["titulo"] . "</td>";
                    echo "<td>" . $fila["pegi"] . "</td>";
                    echo "<td>" . $fila["compania"] . "</td>";
                    echo "</tr>";
                }
            ?>
            </tbody>
        </table>
        
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>