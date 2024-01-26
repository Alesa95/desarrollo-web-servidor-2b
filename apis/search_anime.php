<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <label>Título: </label>
        <input type="text" name="titulo"><br><br>
        <input type="submit" value="buscar">
    </form>

    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $titulo = trim($_POST["titulo"]);
        $titulo = preg_replace('/\s+/','+',$titulo);
        $apiUrl = "https://api.jikan.moe/v4/anime?q=" . $titulo;

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $apiUrl);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec($curl);
        curl_close($curl);
    
        $array = json_decode($respuesta, true);
        $animes = $array['data'];

        foreach($animes as $anime) { ?>
            <form action="show_anime.php" method="get">
                <input type="hidden" name="id" value="<?php echo $anime['mal_id'] ?>">
                <p><input type="submit" value="<?php echo $anime['title'] ?>"></p> 
            </form>
            <img src="<?php echo $anime['images']['jpg']['image_url'] ?>">
        <?php }
    }
    ?>
</body>
</html>