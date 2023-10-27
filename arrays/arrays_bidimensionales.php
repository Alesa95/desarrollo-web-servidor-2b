<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arrays Bidimensionales</title>
</head>
<body>
    <?php
    $juegos = [
        ["Metal Gear Solid 1", "PS1", 60],
        ["Need for speed", "PS2", 55],
        ["Final Fantasy X", "PS2", 50],
        ["Minecraft", "PC", 20]
    ];
    ?>

    <table>
        <caption>Videojuegos</caption>
        <thead>
            <tr>
                <th>Videojuego</th>
                <th>Consola</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($juegos as $juego) {
                list($videojuego, $consola, $precio) = $juego;
                echo "<tr>";
                echo "<td>$videojuego</td>";
                echo "<td>$consola</td>";
                echo "<td>$precio</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    <br><br>

    <table>
        <caption>Videojuegos</caption>
        <thead>
            <tr>
                <th>Videojuego</th>
                <th>Consola</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $nuevo_juego = ["Pay Day 3", "PS3", 60];
            array_push($juegos, $nuevo_juego);

            $c_videojuego = array_column($juegos, 0);
            $c_consola = array_column($juegos, 1);
            array_multisort($c_consola, SORT_ASC, $c_videojuego, SORT_ASC, $juegos);

            foreach($juegos as $juego) {
                list($videojuego, $consola, $precio) = $juego;
                echo "<tr>";
                echo "<td>$videojuego</td>";
                echo "<td>$consola</td>";
                echo "<td>$precio</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    <br><br>

    <?php
    $nuevo_juego = ["Pay Day 3", "PS3", 60];
    array_push($juegos, $nuevo_juego);

    $c_videojuego = array_column($juegos, 0);
    $c_consola = array_column($juegos, 1);
    array_multisort($c_consola, SORT_ASC, $c_videojuego, SORT_ASC, $juegos);

    for($i = 0; $i < count($juegos); $i++) {
        //$juegos[$i][3] = rand(0,20);
        $juegos[$i][count($juegos[$i])] = rand(0,20);
    }
    ?>

    <table>
        <caption>Videojuegos</caption>
        <thead>
            <tr>
                <th>Videojuego</th>
                <th>Consola</th>
                <th>Precio</th>
                <th>Stock</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($juegos as $juego) {
                list($videojuego, $consola, $precio, $stock) = $juego;
                echo "<tr>";
                echo "<td>$videojuego</td>";
                echo "<td>$consola</td>";
                echo "<td>$precio</td>";
                echo "<td>$stock</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    <?php
    $array = [];
    ?>
</body>
</html>