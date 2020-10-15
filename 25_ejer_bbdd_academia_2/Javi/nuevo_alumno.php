<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Academia - Nuevo alumno</title>
</head>
<body>
    <center>
        <h1>Academia</h1>
        <br>
        <h2>Nuevo alumno</h2>
        <br>
        <form action="alumno_insertar.php" method="post">
            <label for="">Nombre:</label>
            <input type="text" name="nombre">
            <br><br>
            <label for="">Sexo:</label>
            <input type="text" name="sexo">
            <br><br>
            <label for="">CP:</label>
            <input type="text" name="cp">
            <br><br>
            <label for="">Población:</label>
            <input type="text" name="poblacion">
            <br><br>
            <label for="">Fecha nacimiento:</label>
            <input type="text" name="fecha_nac">
            <br><br>
            <label for="">Importe matrícula:</label>
            <input type="text" name="importe_matricula">
            <br><br>
            <p>Estudios:</p>
            <textarea name="estudios" id="" cols="30" rows="10" ></textarea>
            <br><br>
            <input type="submit" value="Validar">
        </form>
        <br><br>
        <a href="listado.php">Salir sin guardar</a>
    </center>
</body>

</html>