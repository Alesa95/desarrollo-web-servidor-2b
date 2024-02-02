<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $apiUrl = "https://api.chucknorris.io/jokes/categories";
    echo "<p>$apiUrl</p>";

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $apiUrl);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $respuesta = curl_exec($curl);
    curl_close($curl);

    $categorias = json_decode($respuesta, true);
    ?>

    <form action="" method="post">
        <select name="_categoria">
            <?php foreach($categorias as $categoria) { ?>
                <option value="<?php echo $categoria ?>">
                    <?php echo $categoria ?>
                </option>
            <?php } ?>
        </select><br><br>
        <input type="submit" value="Cuéntame un chiste">
    </form>

<?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $_categoria = $_POST["_categoria"];
        $apiUrl = "https://api.chucknorris.io/jokes/random?category=$_categoria";
        echo "<p>$apiUrl</p>";
    
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $apiUrl);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec($curl);
        curl_close($curl);
    
        $array = json_decode($respuesta, true);

        echo "<h1>" . $array['value'] . "</h1>";
    }
    ?>
</body>
</html>