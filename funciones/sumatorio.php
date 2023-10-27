<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sumatorio</title>
</head>
<body>
    <?php
    function sumatorio(int $num) : int {
        $resultado = 0;

        for($i = 1; $i <= $num; $i++) {
            $resultado += $i;
        }
        return $resultado;
    }

    function factorial(int $num) : int {
        $resultado = 1;

        for($i = 1; $i <= $num; $i++) {
            $resultado *= $i;
        }
        return $resultado;
    }

    echo sumatorio(5);
    # 1 + 2 + 3 + 4 + 5 = 15

    /**
     * factorial(5) = 1*2*3*4*5
     */
    
     /**
      * array_max($array) -> el valor maximo
      * array_min($array) -> el valor minimo
      * array_media($array) -> la media
      */
    ?>
</body>
</html>