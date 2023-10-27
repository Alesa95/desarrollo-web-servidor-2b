<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 5</title>
</head>
<body>
    <?php
    $estudiantes = [
        ["Juan", rand(0,10)],
        ["Rute", rand(0,10)],
        ["Julio", rand(0,10)]
    ];
    ?>

    <table>
        <caption>Estudiantes</caption>
        <thead>
            <tr>
                <th>Estudiante</th>
                <th>Nota</th>
                <th>Calificación</th>
        </thead>
        <tbody>
            <?php
            foreach($estudiantes as $estudiante) {
                list($nombre, $nota) = $estudiante;
                echo "<tr>";
                echo "<td>$nombre</td>";
                echo "<td>$nota</td>";
                $calificacion = match(true) {
                    $nota >= 0 && $nota < 5 => "Suspenso",
                    $nota >= 5 && $nota < 7 => "Aprobado",
                    $nota >= 7 && $nota < 9 => "Notable",
                    $nota >= 9 && $nota <= 10 => "Sobresaliente",
                    default => "Error"
                };
                echo "<td>$calificacion</td>";
                echo "</tr>";
            }
            ?>
        <tbody>
    </table>
</body>
</html>