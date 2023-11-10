<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Videojuego</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <?php require '../funciones/util.php' ?>
    <?php require '../funciones/conexion_videojuegos.php' ?>
</head>
<body>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $temp_id_videojuego = depurar($_POST["id_videojuego"]);
        $temp_titulo = depurar($_POST["titulo"]);
        if(isset($_POST["pegi"])) {
            $temp_pegi = depurar($_POST["pegi"]);
        } else {
            $temp_pegi = "";
        }
        $temp_compania = depurar($_POST["compania"]);

        //  name, tmp_name, size, type
        $nombre_fichero = $_FILES["imagen"]["name"];
        $ruta_temporal = $_FILES["imagen"]["tmp_name"];
        $formato = $_FILES["imagen"]["type"];
        //echo $formato;
        $ruta_final = "imagenes/" . $nombre_fichero;

        move_uploaded_file($ruta_temporal, $ruta_final);

        #   Validación id videojuego
        if(strlen($temp_id_videojuego) == 0) {
            $err_id_videojuego = "Campo obligatorio";
        } else {
            if(filter_var($temp_id_videojuego, FILTER_VALIDATE_INT) === FALSE) {
                $err_id_videojuego = "Introduce un número";
            } else {
                if(strlen($temp_id_videojuego) > 8) {
                    $err_id_videojuego = "Máximo 8 dígitos";
                } else {
                    $id_videojuego = $temp_id_videojuego;
                }
            }
        }

        #   Validación título
        if(strlen($temp_titulo) == 0) {
            $err_titulo = "Campo obligatorio";
        } else {
            if(strlen($temp_titulo) > 100) {
                $err_titulo = "Máximo 100 caracteres";
            } else {
                $titulo = $temp_titulo;
            }
        }

        #   Validación pegi
        if(strlen($temp_pegi) == 0) {
            $err_pegi = "Campo obligatorio";
        } else {
            $pegis_validos = ['3','7','12','16','18'];
            if(!in_array($temp_pegi, $pegis_validos)) {
                $err_pegi = "PEGI no válido";
            } else {
                $pegi = $temp_pegi;
            }
        }

        #   Validación
        if(strlen($temp_compania) == 0) {
            $err_compania = "Campo obligatorio";
        } else {
            if(strlen($temp_compania) > 100) {
                $err_compania = "Máximo 100 caracteres";
            } else {
                $compania = $temp_compania;
            }
        }
        
    }
    ?>
    <div class="container">
        <h1>Nuevo videojuego</h1>
    
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">ID Videojuego</label>
                <input class="form-control" type="text" name="id_videojuego">
                <?php 
                if(isset($err_id_videojuego)) { ?>
                    <div>
                        <?php echo $err_id_videojuego ?>
                    </div>
                <?php
                } ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Título</label>
                <input class="form-control" type="text" name="titulo">
                <?php 
                if(isset($err_titulo)) { ?>
                    <div>
                        <?php echo $err_titulo ?>
                    </div>
                <?php 
                } ?>
            </div>
            <div class="mb-3">
                <label class="form-label">PEGI</label>
                <select class="form-select" name="pegi">
                    <option selected disabled hidden>-- Elige PEGI --</option>
                    <option value="3">PEGI 3</option>
                    <option value="7">PEGI 7</option>
                    <option value="12">PEGI 12</option>
                    <option value="16">PEGI 16</option>
                    <option value="18">PEGI 18</option>
                </select>
                <?php 
                if(isset($err_pegi)) { ?>
                    <div>
                        <?php echo $err_pegi ?>
                    </div>
                <?php 
                } ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Compañía</label>
                <input class="form-control" type="text" name="compania">
                <?php 
                if(isset($err_compania)) { ?>
                    <div>
                        <?php echo $err_compania ?>
                    </div>
                <?php 
                } ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Imagen</label>
                <input class="form-control" type="file" name="imagen">
            </div>
            <input class="btn btn-primary" type="submit" value="Enviar">
        </form>

        <?php
        if(isset($id_videojuego) && isset($titulo) && isset($pegi) 
            && isset($compania)) {

            echo "exito!";

            $sql = "INSERT INTO videojuegos
                        (id_videojuego, titulo, pegi, compania, imagen)
                        VALUES
                        ($id_videojuego, '$titulo', '$pegi', '$compania', '$ruta_final')";

            $conexion -> query($sql);
        }
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>