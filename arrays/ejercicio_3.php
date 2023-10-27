<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
</head>
<body>
    <?php
    for($i = 2; $i <= 50; $i++) {
        $primo = true;
        for($j = 2; $j <= $i-1 && $primo; $j++) {
            if($i % $j == 0) {
                $primo = false;
            }
        }
        if($primo) {
            echo "$i ";
        }
    }
    ?>
</body>
</html>