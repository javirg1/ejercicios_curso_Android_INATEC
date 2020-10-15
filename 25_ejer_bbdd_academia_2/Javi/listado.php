<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Academia - Listado de alumnos</title>
</head>

<body>
    <center>
        <h1>Academia</h1>
        <h2>Matrículas</h2>

        <table width="500" style='border:solid 2px blue'>
            <tr>
                <td>NOMBRE</td>
                <td>POBLACIÓN</td>
            <tr>
                <?php

                // Conexión con la bbdd
                require ("conexion.php");
                //$conexion = mysqli_connect("localhost", "root", "", "bd_academia");

                // creamos consulta sql de selección

                $sql = "select * from alumnos";

                // Lanzamos la consulta y almacenamos el resultado en una variable

                $datos = mysqli_query($conexion, $sql);

                //Con este bucle recorremos fila a fila, los datos que nos devuelve la consulta

                while ($registro = mysqli_fetch_assoc($datos)) {
                    $id = $registro["id"];
                    $nombre = $registro["nombre"];
                    $poblacion = $registro["poblacion"];
                ?>
            <tr>
                <td><a href="ficha.php?id=<?php echo $id ?>"><?php echo $nombre ?></a></td>
                <td><?php echo $poblacion ?></td>
            <tr>
                <?php } ?>
        </table>
        <br><br>
        <a href="nuevo_alumno.php">Nuevo alumno</a>
        <a href="importe_total.php">Importe total matriculaciones</a>
    </center>
</body>

</html>