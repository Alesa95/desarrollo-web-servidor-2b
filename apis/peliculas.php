<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Películas</title>
</head>
<body>
    <?php
    $apiUrl = "http://localhost:8000/api/films";

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $apiUrl);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $respuesta = curl_exec($curl);
    curl_close($curl);

    $array = json_decode($respuesta, true);

    //print_r($array);
    $peliculas = $array['data'];

    foreach($peliculas as $pelicula) { ?>
        <?php $film_id = $pelicula['film_id'] ?>
        <p>
            <a href="show_pelicula.php?film_id=<?php echo $film_id ?>">
                <?php echo $pelicula['title'] ?>
            </a>
        </p>
    <?php } ?>
</body>
</html>