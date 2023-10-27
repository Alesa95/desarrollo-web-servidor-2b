<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Primos</title>
</head>
<body>
    <?php
    DEFINE("MICONSTANTE", 10);

    echo MICONSTANTE; 

    function esPrimo(int $num) : bool {
        $primo = true;
        if($num == 1) {
            $primo = false;
        } else {
            for($i = 2; $i <= $num - 1; $i++) {
                if($num % $i == 0) {
                    $primo = false;
                    break;
                }
            }
        }
        return $primo;
    }

    $num = 1;

    if(esPrimo($num)) {
        echo "El número $num es primo";
    } else {
        echo "El número $num no es primo";
    }

    /**
     * Funcion "primos" que reciba un numero y muestre todos los
     * primos entre 1 y dicho numero
     */

     function primos(int $limite) {
        for($i = 1; $i <= $limite; $i++) {
            if(esPrimo($i)) {
                echo "$i ";
            }
        }
     }

     echo "<br>";
     primos(70);

     /**
      * potencia(base, exponente)
      * potencia(2,3) = 2x2x2 = 8
      * potencia(3,2) = 3x3 = 9
      */
    ?>
</body>
</html>