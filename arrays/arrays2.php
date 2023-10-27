<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arrays</title>
</head>
<body>
    <?php
    $array1 = array(
        'juego1' => 'God of War',
        'juego2' => 'Counter Strike',
        'juego3' => 'Valorant'
    );
    array_push($array1,'Mario Kart');
    $array1['juego4'] = 'Mario Kart';
    $array1['juego2'] = 'Counter Strike 2';
    unset($array1[0]);

    $array2 = array('God of War','Counter Strike','Valorant');
    unset($array2[1]);
    array_push($array2, 'Counter Strike');
    $array2 = array_values($array2);

    print_r($array1);
    print("<br>");
    print_r($array2);
    print("<br>");
    print(count($array2));

    $array3 = [
        'juego1' => 'God of War',
        'juego2' => 'Counter Strike',
        'juego3' => 'Valorant',
    ];
    $array4 = ['God of War','Counter Strike','Valorant'];
    ?>

</body>
</html>