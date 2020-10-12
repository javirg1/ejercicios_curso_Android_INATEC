<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Academia - Alumno del mes</title>
    <style>
        * {
            text-align: center;
        }
    </style>
</head>

<body>
    <h1>Academia</h1>
    <h2>Alumno del mes</h2>
    <?php
    require ("conexion.php");
    //$conexion = mysqli_connect("localhost", "root", "", "bd_academia");
    $sql = "SELECT * FROM alumnos order by RAND() limit 1"; // Consulta para seleccionar aleatoriamente un registro
    $datos = mysqli_query($conexion, $sql);
    if ($registro = mysqli_fetch_assoc($datos)) {
        // ---------------------------------
        $hoy = date("Y-m-d");
        $fecha_nac = $registro["fecha_nac"];
        $edad = $hoy - $fecha_nac;
        // ----------------------------------
        $nombre = $registro["nombre"];
        $poblacion = $registro["poblacion"]; ?>
        <h3>El alumno del mes es:</h3>
        <h3><?php echo "$nombre ($edad años) - $poblacion" ?></h3>
    <?php } ?>
</body>

</html>