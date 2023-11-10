<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- Comentario HTML -->
    <?php
    // Hola
    /**
     * Hola
     */
    # Hola
    echo "<h1>¡Hola mundo!</h1>";

    $entero = 1;        # int
    $decimal = 1.5;     # float
    $exponente = 3e5;   # float (3 x 10^5)
    $string0 = 'mundo';
    $string1 = "Hola $string0";  # string
    $string2 = 'Hola $string0';  # string
    $string3 = 'Hola ' . $string0 . ", Entero: " . $entero;
    $string4 = "Le dije '¿cómo estás?'";
    $boleano = true;
    $array1 = [1,2,3];
    $array2 = [1,"dos",3];

    #var_dump($array2);

    echo "<br><br>";

    /*define("EDAD", 25);
    echo "La edad es " . EDAD;*/

    /*$fecha = date("j F Y");
    echo $fecha;

    $rand_decimal = rand(35,82)/10;
    $rand2 = rand(100,1000)/100;*/

    /*$dia = date("l");
    switch($dia) {
        case "Monday":
        case "Wednesday": 
        case "Friday":
            echo "Hoy hay clase de Web Servidor";
            break;
        default:
            echo "Hoy no hay clase de Web Servidor";
            break;
    }*/

    $dia = date("l");
    $dia_es = match($dia) {
        "Monday" => "Lunes",
        "Tuesday" => "Martes",
        "Wednesday" => "Miércoles"
    };
    echo "Hoy es $dia_es";
    # Hoy es miércoles 20 de septiembre
    ?>
</body>
</html>