<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Películas</title>
</head>
<body>
    <?php
    $film_id = $_GET['film_id'];
    $apiUrl = "http://localhost:8000/api/films/$film_id";

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $apiUrl);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $respuesta = curl_exec($curl);
    curl_close($curl);

    $array = json_decode($respuesta, true);
    $pelicula = $array['data'];

    //print_r($array);
    ?>
    <h1><?php echo $pelicula['title'] ?></h1>
    <h3><?php echo $pelicula['duration'] ?></h3>
    <h3><?php echo $pelicula['year'] ?></h3>
</body>
</html>