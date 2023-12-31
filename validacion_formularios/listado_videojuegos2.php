<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de videojuegos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="estilo.css">
    <?php require '../funciones/conexion_videojuegos.php' ?>
    <?php require '../objetos/videojuego.php' ?>
</head>
<body>
    <?php
    $sql = "SELECT * FROM videojuegos";
    $resultado = $conexion -> query($sql);
    $videojuegos = [];

    while($fila = $resultado -> fetch_assoc()) {
        $id_videojuego = $fila["id_videojuego"];
        $titulo = $fila["titulo"];
        $pegi = $fila["pegi"];
        $compania = $fila["compania"];

        $nuevo_videojuego = new Videojuego($id_videojuego, $titulo, $pegi, $compania);
        array_push($videojuegos, $nuevo_videojuego);
        print_r($nuevo_videojuego);
    }

    // function obtenerVideojuegosObjetos("SELECT * FROM videojuegos WHERE pegi=13);
    ?>
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
                foreach($videojuegos as $videojuego) {
                    echo "<tr>";
                    echo "<td>" . $videojuego -> id_videojuego . "</td>";
                    echo "<td>" . $videojuego -> titulo . "</td>";
                    echo "<td>" . $videojuego -> pegi . "</td>";
                    echo "<td>" . $videojuego -> compania . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>