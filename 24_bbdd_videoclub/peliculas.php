<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Videoclub</title>
</head>

<body>
    <center>
        <h3>Listado de películas registradas</h3>

        <table width="500" style='border:solid 2px blue'>
            <tr>
                <td>ID PELICULA</td>
                <td>TITULO</td>
                <td>CÓD YOUTUBE</td>
                <td></td>
                <td></td>
            <tr>
                <?php

                // Conexión con la bbdd

                $conexion = mysqli_connect("localhost", "root", "", "bd_videoclub");

                // creamos consulta sql de selección

                $sql = "select * from peliculas";

                // Lanzamos la consulta y almacenamos el resultado en una variable

                $datos = mysqli_query($conexion, $sql);

                //Con este bucle recorremos fila a fila, los datos que nos devuelve la consulta

                while ($fila = mysqli_fetch_assoc($datos)) {
                    //Extraigo de la fila en la que estoy, las columnas que me interesen:
                    $id_pelicula = $fila["id_pelicula"];
                    $titulo = $fila["titulo"];
                    $cod_youtube = $fila["cod_youtube"];
                    //Ahora ya puedo pintar la fila en HTML:
                ?>
            <tr>
                <td><?php echo $id_pelicula ?></td>
                <td><?php echo $titulo ?></td>
                <td><?php echo $cod_youtube ?></td>
                <td><a href="formulario_editar.php?id_peli=<?php echo$id_pelicula ?> & titulo=<?php echo$titulo ?> & cod_youtube=<?php echo$cod_youtube ?>">Editar</a></td><!--Pasamos variables por url al archivo formulario_editar.php para mostrar datos en los campos-->
                <td><a href="eliminar.php?id_peli=<?php echo$id_pelicula ?>"onclick="return confirm('¿Quieres eliminar la película')">Eliminar</a></td>
            <tr>
                <?php } ?>
        </table>
        <br>
        <a href="formulario_registro.php">Registrar otra película</a>
    </center>
</body>

</html>