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

        <label>Límite: </label>
        <select name="limite">
            <option selected value="">Todos</option>
            <?php for($i = 1; $i <= 5; $i++) { ?>
                <option value="<?php echo $i ?>"><?php echo $i ?></option>
            <?php } ?>
        </select><br><br>

        <label>Nota mínima: </label>
        <select name="notaMin">
            <option selected hidden value="1">1</option>
            <?php for($i = 1; $i <= 10; $i++) { ?>
                <option value="<?php echo $i ?>"><?php echo $i ?></option>
            <?php } ?>
        </select><br><br>

        <label>Nota máxima: </label>
        <select name="notaMax">
            <option selected hidden value="10">10</option>
            <?php for($i = 1; $i <= 10; $i++) { ?>
                <option value="<?php echo $i ?>"><?php echo $i ?></option>
            <?php } ?>
        </select><br><br>

        <input type="submit" value="buscar">
    </form>

    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $titulo = trim($_POST["titulo"]);
        $titulo = preg_replace('/\s+/','+',$titulo);

        $limite = $_POST["limite"];

        $notaMin = $_POST["notaMin"];
        $notaMax = $_POST["notaMax"];

        $q = "q=$titulo";
        $limit = "limit=$limite";
        $min_score = "min_score=$notaMin";
        $max_score = "max_score=$notaMax";

        $apiUrl = "https://api.jikan.moe/v4/anime?$q&$limit&$min_score&$max_score";
        echo $apiUrl;

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $apiUrl);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec($curl);
        curl_close($curl);
    
        $array = json_decode($respuesta, true);
        $animes = $array['data'];

        foreach($animes as $anime) { ?>
            <p><a href="show_anime.php?id=<?php echo $anime['mal_id'] ?>"><?php echo $anime['title'] ?></a></p>
            <p><?php echo $anime['score'] ?></p>
            <img src="<?php echo $anime['images']['jpg']['image_url'] ?>">
        <?php }
    }
    ?>
</body>
</html>