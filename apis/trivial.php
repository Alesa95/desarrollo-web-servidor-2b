<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        Cantidad: <input type="text" name="_amount"><br><br>
        Categoría: <select name="_category">
            <option value="23">Historia</option>
            <option value="22">Geografía</option>
            <option value="27">Animales</option>
            <option value="15">Videojuegos</option>
        </select><br><br>
        Dificultad: <select name="_difficulty">
            <option value="easy">Fácil</option>
            <option value="medium">Normal</option>
            <option value="hard">Difícil</option>
        </select><br><br>
        <input type="submit" value="Generar preguntas">
    </form>
<?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $_amount = $_POST["_amount"];
        $_category = $_POST["_category"];
        $_difficulty = $_POST["_difficulty"];

        $amount = "amount=$_amount";
        $category = "category=$_category";
        $difficulty = "difficulty=$_difficulty";

        $apiUrl = "https://opentdb.com/api.php?$amount&$category&$difficulty";
        echo "<p>$apiUrl</p>";
    
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $apiUrl);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec($curl);
        curl_close($curl);
    
        $array = json_decode($respuesta, true);
        $preguntas = $array['results'];

        foreach($preguntas as $pregunta) { ?>
            <h1><?php echo $pregunta['question'] ?></h1>
            <p>Categoría: <?php echo $pregunta['category'] ?></p>
            <p>Dificultad: <?php echo $pregunta['difficulty'] ?></p>
            <h2>Respuestas:</h2>
            <p style="color:green"><b><?php echo $pregunta['correct_answer'] ?></b></p>
            <?php foreach($pregunta['incorrect_answers'] as $incorrecta) { ?>
                <p style="color:red"><b><?php echo $incorrecta ?></b></p>
            <?php } 
        }
    }
    ?>
</body>
</html>