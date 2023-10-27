<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mayor de 3</title>
</head>
<body>
    <form action="" method="POST">
        <label>Número 1: </label>
        <input type="number" name="num1"><br>
        <label>Número 2: </label>
        <input type="number" name="num2"><br>
        <label>Número 3: </label>
        <input type="number" name="num3" step="0.1",><br>
        <input type="submit" value="Calcular">
    </form>

    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $num1 = (float) $_POST["num1"];
        $num2 = (float) $_POST["num2"];
        $num3 = (float) $_POST["num3"];
        $text = strtoupper($_POST["texto"]) ;

        if($num1 == $num2 && $num2 == $num3) {
            echo "<h3>Los tres números son iguales</h3>";
        } else {
            $candidato = $num1;
            # 1,2,3
            if ($num2 > $candidato) {
                $candidato = $num2;
            }
            if ($num3 > $candidato) {
                $candidato = $num3;
            }
            echo "El mayor es $candidato";
        }
    }
    ?>
</body>
</html>