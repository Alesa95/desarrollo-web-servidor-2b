<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array Personas</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <?php
    
    $personas = [
        "12345678F" => "Rute",
        "33235325G" => "Ignacio",
        "53454325H" => "Naor"
    ];

    sort($personas);

    ?>
    <ul>
    <?php
    foreach($personas as $persona) {
        echo "<li>$persona</li>";
    }
    ?>
    </ul>

    <!-- --------------------- -->

    <ul>
    <?php
    foreach($personas as $persona) { ?>
        <li><?php echo $persona ?></li>
    <?php }
    ?>
    </ul>

    <!-- FOREACH CLAVE => VALOR -->

    <ul>
    <?php
    foreach($personas as $dni => $nombre) {
        echo "<li>DNI: $dni, Nombre: $nombre</li>";
    }
    ?>
    </ul>

    <!-- TABLA CON DNI Y NOMBRES -->
    <table class="mi-tabla">
        <caption class="mi-caption">Personas</caption>
        <tr>
            <th>DNI</th>
            <th>Nombre</th>
        </tr>
        <?php
        foreach($personas as $dni => $nombre) {
            echo "<tr>";
            echo "<td>$dni</td>";
            echo "<td>$nombre</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>