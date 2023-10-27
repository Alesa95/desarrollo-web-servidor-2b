<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IVA</title>
    <?php require '../funciones/iva.php' ?>
    <?php require '../funciones/irpf.php' ?>
</head>
<body>
    <h1>Formulario para el IVA</h1>
    <form action="" method="get">
        <fieldset>
            <label>Precio: </label>
            <input type="number" name="precio"><br>
            <label>IVA: </label>
            <select name="iva">
                <option value="GENERAL">General</option>
                <option value="REDUCIDO">Reducido</option>
                <option value="SUPERREDUCIDO">Superreducido</option>
                <option value="SIN IVA">Sin IVA</option>
            </select>
            <br>
            <input type="hidden" name="f" value="iva">
            <input type="submit" value="Calcular">
            <?php
            if($_SERVER["REQUEST_METHOD"] == "GET") {
                if(isset($_GET["f"])) {
                    if($_GET["f"] == "iva") {
                        $precio = (float) $_GET["precio"];
                        $iva = $_GET["iva"];
                        echo "<h3>Resultado: " . precioConIVA($precio, $iva) . "</h3>";
                    }
                } 
            }
            ?>
        </fieldset>
    </form>
    <h1>Formulario para el IRPF</h1>
    <form action="" method="get">
        <fieldset>
            <label>Salario: </label>
            <input type="number" step="1000" name="salario"><br>
            <input type="hidden" name="f" value="irpf">
            <input type="submit" value="Calcular">
            <?php
            if($_SERVER["REQUEST_METHOD"] == "GET") {
                if(isset($_GET["f"])) {
                    if($_GET["f"] == "irpf") {
                        $salario = (float) $_GET["salario"];
                        echo "<h3>Resultado: " . salarioConIRPF($salario) . "</h3>";
                    }
                } 
            }
            ?>
        </fieldset>
    </form>
    <?php
    /*if($_SERVER["REQUEST_METHOD"] == "GET") {
        if(isset($_GET["f"])) {
            if($_GET["f"] == "iva") {
                $precio = (float) $_GET["precio"];
                $iva = $_GET["iva"];
                echo precioConIVA($precio, $iva);
            }
            if($_GET["f"] == "irpf") {
                $salario = (float) $_GET["salario"];
                echo salarioConIRPF($salario);
            }
            #   Forma alternativa de resolverlo con un switch
            /*
            switch($_GET["f"]) {
                case "iva": 
                    $precio = (float) $_GET["precio"];
                    $iva = $_GET["iva"];
                    echo precioConIVA($precio, $iva);
                    break;
                case "irpf":
                    $salario = (float) $_GET["salario"];
                    echo salarioConIRPF($salario);
                    break;
            }
            */
    /*    } 
    }*/
    ?>
</body>
</html>