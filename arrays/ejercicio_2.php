<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>
</head>
<body>
    <?php
    $suma = 0;
    for($i = 0; $i <= 20; $i++) {
        if($i % 2 == 0) {
            $suma += $i;
        }
    }
    echo $suma;

    // Calcular el factorial de 8
    ?>
</body>
</html>