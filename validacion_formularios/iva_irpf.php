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
    <?php
    function depurar(string $entrada) : string {
        $salida = htmlspecialchars($entrada);
        $salida = trim($salida);
        return $salida;
    }
    ?>
    <?php
        if($_SERVER["REQUEST_METHOD"] == "GET") {
            if(isset($_GET["f"])) {
                if($_GET["f"] == "iva") {
                    $temp_precio = depurar($_GET["precio"]);
                    if(isset($_GET["iva"])) {
                        $temp_iva = depurar($_GET["iva"]);
                    } else {
                        $temp_iva = "";
                    }

                    #   Validación del precio
                    if(!strlen($temp_precio) > 0) {
                        $err_precio = "El precio es obligatorio";
                    } else {
                        if(filter_var($temp_precio, FILTER_VALIDATE_FLOAT) === false) {
                            $err_precio = "El precio debe ser un número";
                        } else {
                            $temp_precio = (float) $temp_precio;
                            if($temp_precio < 0) {
                                $err_precio = "El precio debe ser mayor que cero";
                            } else {
                                $precio = $temp_precio;
                            }
                        }
                    }
                    #   Validación del IVA
                    if(!strlen($temp_iva) > 0) {
                        $err_iva = "El IVA es obligatorio";
                    } else {
                        $lista_iva_validos = ["GENERAL", "REDUCIDO", "SUPERREDUCIDO", "SIN IVA"];
                        if(!in_array($temp_iva, $lista_iva_validos)) {
                            $err_iva = "El IVA debe ser válido";
                        } else {
                            $iva = $temp_iva;
                        }
                    }
                }
            } 
        }
    ?>
    <h1>Formulario para el IVA</h1>
    <form action="" method="get">
        <fieldset>
            <label>Precio: </label>
            <input type="text" name="precio">
            <?php if(isset($err_precio)) echo $err_precio ?>
            <br>
            <label>IVA: </label>
            <select name="iva">
                <option disabled selected hidden>-- Elige un IVA --</option>
                <option value="GENERAL">General</option>
                <option value="REDUCIDO">Reducido</option>
                <option value="SUPERREDUCIDO">Superreducido</option>
                <option value="SIN IVA">Sin IVA</option>
            </select>
            <?php if(isset($err_iva)) echo $err_iva ?>
            <br>
            <input type="hidden" name="f" value="iva">
            <input type="submit" value="Calcular">
            <?php
            if(isset($precio) && isset($iva)) {
                echo "<h3>" . precioConIVA($precio, $iva) . "</h3>";
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
</body>
</html>