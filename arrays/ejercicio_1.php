<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
</head>
<body>
    <?php
    echo "<h3>Opción 1</h3>";
    echo "[";
    for($i = 1; $i <= 50; $i++) {
        if($i % 3 == 0) {
            if($i + 3 > 50) {
                echo "$i]";
            } else {
                echo "$i,";
            }
        }
    }

    echo "<br><br>";
    echo "<h3>Opción 2</h3>";
    echo "<br><br>";

    $maximo = 50;
    echo "[";
    for($i = 1; $i <= $maximo; $i++) {
        if($i % 3 == 0) {
            echo $i;
            if($i + 3 <= $maximo) {
                echo ",";
            }
        }
    }
    echo "]";
    ?>
</body>
</html>