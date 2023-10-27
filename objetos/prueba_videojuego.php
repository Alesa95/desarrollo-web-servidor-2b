<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba videojuego</title>
    <?php require 'videojuego.php' ?>
</head>
<body>
    <?php
    $videojuego1 = new Videojuego(1, "Spiderman", "7", "Sony");
    $videojuego2 = new Videojuego(2, "Mario Wonder", "3", "Nintendo");
    $videojuego3 = new Videojuego(3, "Baldurs Gate", "18", "Larial Studios");
    $videojuegos = [$videojuego1, $videojuego2, $videojuego3];
    ?>

    <table>
        <thead>
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
</body>
</html>