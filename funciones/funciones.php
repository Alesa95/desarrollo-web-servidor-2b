<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funciones</title>
</head>
<body>
    <?php
    function sumaDosV1 ($num1, $num2) {
        return $num1 + $num2;
    }

    function sumaDosV2 (int $num1, int $num2) {
        return $num1 + $num2;
    }

    function sumaDosV3 (int $num1, int $num2) : int {
        return $num1 + $num2;
    }

    function sumaDosV4 (int|float $num1, int|float $num2) : float {
        return $num1 + $num2;
    }

    function divideDos (int $num1, int $num2) : float {
        return $num1 / $num2;
    }

    //echo divideDos(3,2);
    echo sumaDosV4(3.5,1);

    /**
     * Función que reciba como parámetro un número entero
     * y devuelva la suma entera de todos los números del
     * 1 al número introducido
     * 
     * Ejemplo: 3 => 1 + 2 + 3
     * 
     * function sumatorio
     * 
     * sumatorio(3) = 6
     */
    ?>
</body>
</html>