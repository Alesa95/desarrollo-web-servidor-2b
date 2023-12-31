<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <?php require 'database_conection.php' ?>
</head>
<body>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $titulo = $_POST["titulo"];
        $columna = $_POST["columna"];
        $orden = $_POST["orden"];

        $sql = $_conexion -> prepare("SELECT * FROM libros 
            WHERE titulo 
            LIKE CONCAT('%',?,'%')
            ORDER BY $columna $orden");
        $sql -> bind_param("s", $titulo);
        $sql -> execute();
        $resultado = $sql -> get_result();
        $_conexion -> close();
    }

    if($_SERVER["REQUEST_METHOD"] == "GET") {
        $sql = $_conexion -> prepare("SELECT * FROM libros");
        $sql -> execute();
        $resultado = $sql -> get_result();
        $_conexion -> close();
    }
    
    ?>
    <div class="container">
        <h1>Libros</h1>

        <form action="" method="post">
            <div class="row mb-3">
                <div class="col-4">
                    <input class="form-control" type="text" name="titulo">
                </div>
                <div class="col-2">
                    <input class="btn btn-primary" type="submit" value="Buscar">
                </div>
            </div>
            <div class="row mb-3 align-items-center">
                <div class="col-1">
                    <label class="form-label">Ordenar</label>
                </div>
                <div class="col-2">
                    <select class="form-select" name="columna">
                        <option selected value="titulo">Título</option>
                        <option value="paginas">Páginas</option>
                        <option value="autor">Autor/a</option>
                    </select>
                </div>
                <div class="col-3">
                    <select class="form-select" name="orden">
                        <option selected value="asc">Ascendente</option>
                        <option selected value="desc">Descendente</option>
                    </select>
                </div>
            </div>
        </form>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Páginas</th>
                    <th>Autor/a</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                while($fila = $resultado -> fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $fila["titulo"] ?></td>
                        <td><?php echo $fila["paginas"] ?></td>
                        <td><?php echo $fila["autor"] ?></td>
                        <td>
                            <form action="view_book.php" method="GET">
                                <input type="hidden" name="titulo" value="<?php echo $fila["titulo"] ?>">
                                <input class="btn btn-secondary" type="submit" value="Ver">
                            </form>
                        </td>
                        <td>
                            <form action="delete_book.php" method="POST">
                                <input type="hidden" name="titulo" value="<?php echo $fila["titulo"] ?>">
                                <input class="btn btn-danger" type="submit" value="Borrar">
                            </form>
                        </td>
                    </tr>
                <?php }
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>