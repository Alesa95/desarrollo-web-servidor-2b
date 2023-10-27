<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arrays</title>
</head>
<body>
    <?php
    function array_min(array $numeros) : int {
        $minimo_candidato = $numeros[0];
        for($i = 1; $i < count($numeros); $i++) {
            if($numeros[$i] < $minimo_candidato) {
                $minimo_candidato = $numeros[$i];
            }
        }
        return $minimo_candidato;
    }

    function array_media(array $numeros) : float {
        $suma_acumulada = 0;
        for($i = 0; $i < count($numeros); $i++) {
            $suma += $numeros[$i];
        }
        return round($suma_acumulada / count($numeros), 2);
    }

    /**
     * Funcion "esPrimo" que devuelva un bool
     * que indique si un número es primo o no
     *  
     * esPrimo(4) = false
     * esPrimo(5) = true
     */
    ?>
</body>
</html>