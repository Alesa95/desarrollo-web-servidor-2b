<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuario</title>
    <?php require '../funciones/util.php' ?>
    <?php require '../funciones/base_de_datos.php' ?>
</head>
<body>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $temp_usuario = depurar($_POST["usuario"]);
        $temp_nombre = depurar($_POST["nombre"]);
        $temp_apellidos = depurar($_POST["apellidos"]);
        $temp_fecha_nacimiento = depurar($_POST["fecha_nacimiento"]);

        #   Validación del usuario
        if(strlen($temp_usuario) == 0) {
            $err_usuario = "El nombre de usuario es obligatorio";
        }else{
            $regex = "/^[a-zA-ZñÑ_][a-zA-Z0-9ñÑ_ ]{3,7}$/";
            if(!preg_match($regex, $temp_usuario)) {
                $err_usuario = "El nombre de usuario debe contener de 4 a 8 
                    caracteres o números o barrabaja";
            }else{
                $usuario = $temp_usuario;
            }
        }

        #   Validación del nombre
        if(strlen($temp_nombre) == 0) {
            $err_nombre = "El nombre es obligatorio";
        }else{
            if(strlen($temp_nombre) < 2 || strlen($temp_nombre) > 20) {
                $err_nombre = "El nombre debe contener entre 2 y 20 caracteres";
            }else{
                $regex = "/^[a-zA-Z ]+$/";
                if(!preg_match($regex, $temp_nombre)) {
                    $err_nombre = "El nombre solo puede contener letras y espacios en blanco";
                }else{
                    $nombre = $temp_nombre;
                }
            }
        }

        #   Validación de los apellidos
        if(strlen($temp_apellidos) == 0) {
            $err_apellidos = "El apellido es obligatorio";
        }else{
            if(strlen($temp_apellidos) < 2 || strlen($temp_apellidos) > 40) {
                $err_apellidos = "El apellido debe contener entre 2 y 20 caracteres";
            }else{
                $regex = "/^[a-zA-Z ]+$/";
                if(!preg_match($regex, $temp_apellidos)) {
                    $err_apellidos = "El apellido solo puede contener letras y espacios en blanco";
                }else{
                    $apellidos = $temp_apellidos;
                }
            }
        }

        #   Validación de la fecha de nacimiento
        if(strlen($temp_fecha_nacimiento) == 0) {
            $err_fecha_nacimiento = "La fecha de nacimiento es obligatoria";
        }else{
            $fecha_actual = date("Y-m-d");
            list($anyo_actual, $mes_actual, $dia_actual) =
                explode('-', $fecha_actual);

            list($anyo_nacimiento, $mes_nacimiento, $dia_nacimiento) = 
                explode('-', $temp_fecha_nacimiento);

            if($anyo_actual - $anyo_nacimiento < 18) {
                $err_fecha_nacimiento = "No puedes ser menor de edad";
            }elseif($anyo_actual - $anyo_nacimiento == 18) {
                if($mes_actual - $mes_nacimiento < 0) {
                    $err_fecha_nacimiento = "No puedes ser menor de edad";
                }elseif($mes_actual - $mes_nacimiento == 0) {
                    if($dia_actual - $dia_nacimiento < 0) {
                        $err_fecha_nacimiento = "No puedes ser menor de edad";
                    }else{
                        $fecha_nacimiento = $temp_fecha_nacimiento;
                    }
                }elseif($mes_actual - $mes_nacimiento > 0) {
                    $fecha_nacimiento = $temp_fecha_nacimiento;
                }
            }elseif($anyo_actual - $anyo_nacimiento > 18) {
                $fecha_nacimiento = $temp_fecha_nacimiento;
            }
        }
    }
    ?>
    <form action="" method="post">
        <label>Usuario: </label>
        <input type="text" name="usuario">
        <?php if(isset($err_usuario)) echo $err_usuario ?>
        <br><br>
        <label>Nombre: </label>
        <input type="text" name="nombre">
        <?php if(isset($err_nombre)) echo $err_nombre ?>
        <br><br>
        <label>Apellidos: </label>
        <input type="text" name="apellidos">
        <?php if(isset($err_apellidos)) echo $err_apellidos ?>
        <br><br>
        <label>Fecha de nacimiento: </label>
        <input type="date" name="fecha_nacimiento">
        <?php if(isset($err_fecha_nacimiento)) echo $err_fecha_nacimiento ?>
        <br><br>
        <input type="submit" value="Enviar">
    </form>
    <?php
    if(isset($usuario) && isset($nombre) && isset($apellidos)
        && isset($fecha_nacimiento)) {

        echo "<h3>Usuario: $usuario</h3>";
        echo "<h3>Nombre: $nombre</h3>";
        echo "<h3>Apellidos: $apellidos</h3>";
        echo "<h3>Fecha de nacimiento: $fecha_nacimiento</h3>";

        $sql = "INSERT INTO usuarios 
            (usuario, nombre, apellidos, fecha_nacimiento) 
            VALUES 
            ('$usuario', '$nombre', '$apellidos', '$fecha_nacimiento')";
        
        $conexion->query($sql);
    }
    ?>
</body>
</html>